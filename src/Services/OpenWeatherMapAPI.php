<?php

namespace Services;

use Httpful\Request;
use Models\Report;

class OpenWeatherMapAPI
{
    protected $apiKey;
    protected $urls;

    public function __construct($apiKey, $urls)
    {
        $this->apiKey = $apiKey;
        $this->urls = $urls;
    }

    public function getWeather($zip) {
        return $this->weatherApiGet($zip)->body;
    }

    public function weatherApiGet($zip) {
        return Request::get($this->urls['weather'] . "?zip=$zip,us" . "&units=imperial&appid=" . $this->apiKey)->send();
    }

    public function getReport($zip) {
        $weather = $this->getWeather($zip);

        return Report::create()
            ->setZip($zip)
            ->setWindSpeed((float) $weather->wind->speed)
            ->setWindDirection((float) $weather->wind->deg)
            ->setTemperature((float) $weather->main->temp)
            ->setPressure((float) $weather->main->pressure)
            ->setHumidity((float) $weather->main->humidity)
            ->setCondition($weather->weather[0]->main);
    }

}