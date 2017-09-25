<?php

namespace Services;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OpenWeatherMapAPIServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
       $app['owm.api'] = function ($app) {
           return new OpenWeatherMapAPI($app['owm.apikey'], $app['owm.urls']);
       };
    }
}