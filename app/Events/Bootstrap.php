<?php

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Bayfront\HttpResponse\Response;

/**
 * Actions to perform in order to bootstrap the application.
 */
class Bootstrap extends EventSubscriber implements EventSubscriberInterface
{

    protected $response;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            'app.bootstrap' => [
                [
                    'method' => 'modifyResponseHeaders',
                    'priority' => 5
                ]
            ]
        ];
    }

    /**
     * @return void
     */

    public function modifyResponseHeaders()
    {

        $this->response->setHeaders([
            'X-Application' => 'Bones',
            'X-Application-Version' => App::getBonesVersion()
        ]);

    }

}