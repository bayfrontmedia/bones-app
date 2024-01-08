<?php

use Bayfront\Bones\Application\Utilities\App;

/*
 * Configuration for deployment scripts (console commands).
 */

return [
    'backup_path' => App::getEnv('APP_BACKUP_PATH') // Optional. Used with deploy: commands
];