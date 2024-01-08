<?php /** @noinspection PhpUnused */

namespace App\Console\Commands;

use Bayfront\Bones\Application\Utilities\App;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * DeployApp Command.
 *
 * This console command is designed to help facilitate the app deployment process.
 */
class DeployApp extends Command
{

    /**
     * @return void
     */

    protected function configure(): void
    {

        $this->setName('deploy:app')
            ->setDescription('Deploy application')
            ->addArgument('target', InputArgument::REQUIRED, 'ie: origin/master (branch), v1.0.0 (tag), or commit hash')
            ->addOption('backup', null, InputOption::VALUE_NONE);

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws Exception
     */

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $output->writeln('<info>Beginning deployment...</info>');

        if ($input->getOption('backup')) {

            if (!App::getConfig('deploy.backup_path')
                || App::getConfig('deploy.backup_path') == ''
                || App::getConfig('deploy.backup_path') == '/') {

                $output->writeln('<error>Unable to create backup: No backup path specified in app config file</error>');
                $output->writeln('<info>For more info, see: https://github.com/bayfrontmedia/bones/blob/master/docs/usage/config.md#deploy</info>');

            } else {

                $output->writeln('<info>Backing up...</info>');

                $git_path = App::basePath('/.git');

                if (file_exists($git_path)) {

                    $git_head = trim(substr(file_get_contents($git_path . '/HEAD'), 4));
                    $git_hash = substr(trim(file_get_contents($git_path . '/' . $git_head)), 0, 7);

                    $backup_name = date('Y-m-d_H-i-s') . '_' . $git_hash;
                    $backup_location = rtrim(App::getConfig('deploy.backup_path'), '/') . '/' . $backup_name;

                    if (!is_dir($backup_location)) {
                        mkdir($backup_location, 0755, true);
                    }

                    shell_exec('rsync -ar ' . App::basePath('/') . ' ' . $backup_location);

                    $output->writeln('<info>Backed up to: ' . $backup_location . '<info>');

                }

            }

        }

        $target = $input->getArgument('target');

        /*
         * |--------------------------------------------------------------------------
         * | Insert whatever commands are needed to deploy your app here
         * |--------------------------------------------------------------------------
         */

        // ------------------------- Take app offline -------------------------

        $output->writeln('<info>Putting Bones into maintenance mode...</info>');

        shell_exec('php bones down --message="Update in progress. Check back in a few minutes."');

        // ------------------------- Pull from Git -------------------------

        $output->writeln('<info>Pulling from Git target: ' . $target . '...</info>');

        shell_exec('git fetch --all');
        shell_exec('git reset --hard ' . $target);

        /*
         * Remove untracked files if desired (use caution)
         *
         * $output->writeln('<info>Removing untracked files...</info');
         * shell_exec('git clean -fd');
         */

        // -------------------------Install dependencies -------------------------

        $output->writeln('<info>Installing dependencies...</info>');

        shell_exec('composer install --no-dev --no-interaction --optimize-autoloader');

        // ------------------------- Database migrations -------------------------

        // $output->writeln('<info>Running database migrations...</info>');
        // shell_exec('php bones migrate:up --force');

        // ------------------------- Cache resources -------------------------

        $output->writeln('<info>Caching resources...</info>');

        shell_exec('php bones cache:save');

        // ------------------------- Update permissions (if needed) -------------------------

        // $output->writeln('<info>Updating permissions...</info>');
        // shell_exec('chgrp -R www-data ' . App::storagePath('/app'));
        // shell_exec('chmod -R 775 ' . App::storagePath('/app'));

        // ------------------------- Bring app online -------------------------

        $output->writeln('<info>Taking Bones out of maintenance mode...</info>');

        shell_exec('php bones up');

        /*
         * |--------------------------------------------------------------------------
         * | Do not edit below
         * |--------------------------------------------------------------------------
         */

        $output->writeln('<info>Deployment completed in ' . App::getElapsedTime() . 'secs!</info>');

        return Command::SUCCESS;
    }


}