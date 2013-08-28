<?php

class Report
{
    protected $title;
    protected $values;
    protected $formatter;

    public function __construct($title, $values, Callable $formatter)
    {
        $this->title     = $title;
        $this->values    = $values;
        $this->formatter = $formatter;
    }

    public function __invoke()
    {
        call_user_func($this->formatter, $this);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getValues()
    {
        return $this->values;
    }
}