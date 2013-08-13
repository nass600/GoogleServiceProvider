<?php

namespace Nass600\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class GooglePlusServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['googleplus'] = $app->share(
            function () use ($app) {
                $client = new \GoogleApi\Client();
                $client->setClientId($app['google.app_id']);
                $client->setClientSecret($app['google.secret']);
                $client->setRedirectUri($app['google.redirect_uri']);
                $client->setScopes($app['google.scopes']);

                return $client;
            }
        );
    }

    public function boot(Application $app)
    {
    }
}
