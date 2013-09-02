<?php

interface WriterInterface
{
    public function write($text);
}

abstract class WriterDecorator implements WriterInterface
{
    protected $subject;

    public function __construct(WriterInterface $subject)
    {
        $this->subject = $subject;
    }
}

class SimpleWriter implements WriterInterface
{
    public function write($text)
    {
        echo $text;
    }
}

class BoldWriter extends WriterDecorator
{
    public function write($text)
    {
        echo $this->subject->write('<b>' . $text . '</b>');
    }
}

class UnderlineWriter extends WriterDecorator
{
    public function write($text)
    {
        $this->subject->write('<u>' . $text . '</u>');
    }
}

class NewLineWriter extends WriterDecorator
{
    public function write($text)
    {
        $this->subject->write($text . PHP_EOL);
    }
}