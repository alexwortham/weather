<?php

use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

class App extends Application
{
    public function __construct(array $values = array(), $testDB = true)
    {
        $config = array_merge($this->readConfig(), $values);

        parent::__construct($config);

        $this->registerDoctrineServiceProvider();
        $this->registerDoctrineOrmServiceProvider();
        $this->registerOwmApiServiceProvider();
    }

    protected function registerDoctrineServiceProvider() {
        $this->register(new DoctrineServiceProvider);
    }

    protected function registerDoctrineOrmServiceProvider() {
        $this->register(new DoctrineOrmServiceProvider);
    }

    protected function registerOwmApiServiceProvider() {
        $this->register(new \Services\OpenWeatherMapAPIServiceProvider);
    }

    protected function readConfig() {
        return require(__DIR__ . '/../config/config.php');
    }
}