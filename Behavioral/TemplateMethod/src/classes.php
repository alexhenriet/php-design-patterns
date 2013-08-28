<?php

abstract class Report
{ 
  protected $title;
  protected $values;

  public function __construct($title, $values)
  {
    $this->title  = $title;
    $this->values = $values;
  }

  public function generate() 
  {
    $this->header();
    $this->body();
    $this->footer();  
  }

  protected abstract function header();

  protected abstract function body();

  protected abstract function footer();
}

class HtmlReport extends Report
{
  public function header() 
  {
    echo '<html><head><title>' . htmlentities($this->title) . '</title></head>';
  }

  public function body()
  {
    echo '<body><h1>' . htmlentities($this->title) . '</h1><ol id="values">';
    foreach($this->values as $value) {
      echo '<li>' . htmlentities($value) . '</li>';
    }
    echo '</ol></body>';
  }

  public function footer()
  {
    echo '<footer><p>...</p></footer></html>';
  }
}

class TxtReport extends Report
{
  public function header()
  {
    echo $this->title . PHP_EOL;
  }

  public function body()
  {
    foreach($this->values as $value) {
      echo $value . PHP_EOL;
    }
  }

  public function footer()
  {
    echo '...' . PHP_EOL;
  }
}
