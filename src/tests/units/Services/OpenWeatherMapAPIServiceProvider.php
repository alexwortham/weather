<?php

namespace tests\unit\Services;

use mageekguy\atoum;
use Models\Report;

class OpenWeatherMapAPIServiceProvider extends atoum\test
{

    public function testGetWeather() {
        $this->given($api = (new \App())['owm.api'])
            ->when($weather = $api->getWeather('37801'))
            ->then
            ->class($coord = $weather->coord)
                ->float($coord->lat)
                    ->isGreaterThanOrEqualTo(-90.0)
                    ->isLessThanOrEqualTo(90.0)
                ->float($coord->lon)
                    ->isGreaterThanOrEqualTo(-180.0)
                    ->isLessThanOrEqualTo(180.0)
            ->array($weather->weather)
                ->isNotEmpty()
            ->class($weath = $weather->weather[0])
                ->integer($weath->id)
                ->string($weath->main)
                ->string($weath->description)
                ->string($weath->icon)
            ->string($weather->base)
            ->class($main = $weather->main)
                ->float((float) $main->temp)
                ->float((float) $main->pressure)
                ->float((float) $main->humidity)
                ->float((float) $main->temp_min)
                ->float((float) $main->temp_max)
            ->integer($weather->visibility)
            ->class($wind = $weather->wind)
                ->float((float) $wind->speed)
                ->float((float) $wind->deg)
            ->class($weather->clouds)
            ->integer($weather->dt)
            ->class($weather->sys)
            ->integer($weather->id)
            ->string($weather->name)
            ->integer($weather->cod)
        ;
    }

    public function testGetReport() {
        /** @var Report $report */
        $this->given($api = (new \App())['owm.api'])
            ->when($report = $api->getReport('37801'))
            ->then
            ->string($report->getZip())
            ->string($report->getCondition())
            ->float($report->getWindSpeed())
            ->float($report->getWindDirection())
            ->float($report->getTemperature())
            ->float($report->getPressure())
            ->float($report->getHumidity())
        ;
    }
}
