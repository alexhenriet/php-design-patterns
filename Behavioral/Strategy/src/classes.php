<?php

interface ReportFormatterInterface
{
    public function generate(Report $context);
}

class Report
{
    protected $title;
    protected $values;
    protected $formatter;

    public function __construct($title, $values, ReportFormatterInterface $formatter)
    {
        $this->title     = $title;
        $this->values    = $values;
        $this->formatter = $formatter;
    }

    public function generate()
    {
        $this->formatter->generate($this);
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

class HtmlReportFormatter implements ReportFormatterInterface
{
    public function generate(Report $context)
    {
        echo '<html><head><title>' . htmlentities($context->getTitle()) . '</title></head>';
        echo '<body><h1>' . htmlentities($context->getTitle()) . '</h1><ol id="values">';
        foreach($context->getValues() as $value) {
            echo '<li>' . htmlentities($value) . '</li>';
        }
        echo '</ol></body>';
        echo '<footer><p>...</p></footer></html>';
    }
}

class TextReportFormatter implements ReportFormatterInterface
{
    public function generate(Report $context)
    {
        echo $context->getTitle() . PHP_EOL;
        foreach($context->getValues() as $value) {
            echo $value . PHP_EOL;
        }
        echo '...' . PHP_EOL;
    }
}