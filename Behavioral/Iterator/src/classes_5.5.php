<?php

class Country
{
    private $name;
    private $cities;

    public function __construct($name)
    {
        $this->name = $name;
        $this->cities = new \SplObjectStorage();
    }

    public function addCity(City $city)
    {
        $this->cities->attach($city);
        return $this;
    }

    public function cityIterator()
    {
        foreach ($this->cities as $city) {
            yield $city;
        }
    }
}

class City
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}