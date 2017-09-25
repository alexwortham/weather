<?php

namespace tests\units;

use mageekguy\atoum;

class App extends atoum\test
{
    public function testConstruct() {
        $this->given(
            $config = require __DIR__ . '/../../../config/config.php'
        )
            ->then
            ->array($config)
            ->hasKeys(['db.options', 'orm.proxies_dir', 'orm.em.options', 'owm.zips'])
            ->child['db.options'](function ($child) {
                $child
                    ->hasKeys(['driver','path']);
            })
            ->child['orm.em.options'](function ($child) {
                $child->hasKey('mappings')
                    ->child['mappings'](function ($subChild) {
                        $subChild[0]->hasKeys(['type', 'namespace', 'path']);
                    });
            })
            ->child['owm.zips'](function ($child) {
                $child->isNotEmpty();
            })
        ;

        $this->given($app = new \App())
            ->then
            ->string($app['db.options']['driver'])
                ->isIdenticalTo($config['db.options']['driver'])
            ->string($app['db.options']['path'])
                ->isIdenticalTo($config['db.options']['path'])
            ->string($app['orm.proxies_dir'])
                ->isIdenticalTo($config['orm.proxies_dir'])
            ->array($app['orm.em.options']['mappings'][0])
                ->keys->containsValues(array_keys($config['orm.em.options']['mappings'][0]))
            ->array($app['orm.em.options']['mappings'][0])
                ->containsValues(array_values($config['orm.em.options']['mappings'][0]))
            ->array($app['owm.zips'])
                ->keys->containsValues(array_keys($config['owm.zips']))
            ->array($app['owm.zips'])
                ->containsValues(array_values($config['owm.zips']))
            ->object($app['orm.em'])
            ;
    }
}