<?php

class Star
{
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }
        return $instance;
    }

    final private function __construct() { }

    final private function __clone() { }
}

class Sun extends Star
{
    public function rise()
    {
        echo 'In the east.' . PHP_EOL;
    }
}