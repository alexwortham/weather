<?php

namespace Models;

/**
 * @Entity
 * @HasLifecycleCallbacks
 */
class Report
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string") */
    public $zip;

    /** @Column(type="string") */
    public $condition;

    /** @Column(type="float") */
    public $pressure;

    /** @Column(type="float") */
    public $temperature;

    /** @Column(type="float") */
    public $windSpeed;

    /** @Column(type="float") */
    public $windDirection;

    /** @Column(type="float") */
    public $humidity;

    /** @Column(type="datetime") */
    public $timestamp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     * @return Report
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     * @return Report
     */
    public function setCondition($condition)
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPressure()
    {
        return $this->pressure;
    }

    /**
     * @param mixed $pressure
     * @return Report
     */
    public function setPressure($pressure)
    {
        $this->pressure = $pressure;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @param mixed $temperature
     * @return Report
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWindSpeed()
    {
        return $this->windSpeed;
    }

    /**
     * @param mixed $windSpeed
     * @return Report
     */
    public function setWindSpeed($windSpeed)
    {
        $this->windSpeed = $windSpeed;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWindDirection()
    {
        return $this->windDirection;
    }

    /**
     * @param mixed $windDirection
     * @return Report
     */
    public function setWindDirection($windDirection)
    {
        $this->windDirection = $windDirection;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @param mixed $humidity
     * @return Report
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /** @PrePersist */
    public function updateTimestamp() {
        $this->timestamp = new \DateTime();
    }

    public static function create() {
        return new Report();
    }
}