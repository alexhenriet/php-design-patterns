<?php

class SpaceRocket
{
    public function launch()
    {
        echo 'Four, three, two, one .. IGNITION !' . PHP_EOL;
    }

    public function selfDestroy()
    {
        echo 'KABOOM !' . PHP_EOL;
    }
}

class VirtualProxy
{
    private $className;
    private $realObject = null;
   
    public function __construct($className)
    {
	$this->className = $className;
    }
                              
    public function __call($method, $parameters)
    {   
        $this->realObject ?: $this->realObject = new $this->className();
        $this->realObject->$method($parameters);
    }
}
