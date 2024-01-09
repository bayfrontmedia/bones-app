<?php

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Services\Events\EventSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Bayfront\HttpResponse\Response;

/**
 * Actions to perform in order to bootstrap the application.
 */
class Bootstrap extends EventSubscriber implements EventSubscriberInterface
{

    protected Response $response;

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
            new EventSubscription('app.bootstrap', [$this, 'modifyResponseHeaders'], 10),
            new EventSubscription('app.http', [$this, 'sampleGreeting'], 10)
        ];

    }

    /**
     * Add Bones values to the HTTP response headers.
     *
     * @return void
     */

    public function modifyResponseHeaders(): void
    {

        $this->response->setHeaders([
            'X-Application' => 'Bones',
            'X-Application-Version' => App::getBonesVersion()
        ]);

    }

    /**
     * Return a sample response confirmation that Bones is successfully installed.
     * If handling HTTP requests, this would typically be removed in favor of using a router.
     *
     * @return void
     */

    public function sampleGreeting(): void

    {
        $this->response->setBody('<h1>Bones v' . App::getBonesVersion() . ' is successfully installed!</h1>')->send();
    }

}