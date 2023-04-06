<?php

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;

/**
 * Actions to perform when environment == "dev".
 */
class Dev extends EventSubscriber implements EventSubscriberInterface
{

    /**
     * The container will resolve any dependencies.
     */

    public function __construct()
    {

    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {

        if (App::environment() != App::ENV_DEV) {
            return [];
        }

        return [
            'app.bootstrap' => [
                [
                    'method' => 'sampleMethod',
                    'priority' => 5
                ]
            ]
        ];
    }

    /**
     * @return void
     */

    public function sampleMethod(): void
    {
        // Do something amazing
    }

}