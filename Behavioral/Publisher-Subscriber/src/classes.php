<?php

interface PublisherInterface
{
    public function notify($category, $subject);
}

interface ObserverInterface
{
    public function update($subject);
}

class Publisher implements PublisherInterface
{
    private $categories = [];

    public function subscribe($category, ObserverInterface $observer)
    {
        if (!isset($this->categories[$category])) {
            $this->categories[$category] = new \SplObjectStorage();
        }
        $this->categories[$category]->attach($observer);
    }

    public function unsubscribe($category, ObserverInterface $observer)
    {
        if (isset($this->categories[$category])) {
            $this->categories[$category]->detach($observer);
        }
    }

    public function notify($category, $subject)
    {
        if (isset($this->categories[$category])) {
            foreach ($this->categories[$category] as $observer) {
                $observer->update($subject);
            }
        }
    }
}

class Husband
{
    private $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function pay()
    {
        $this->publisher->notify('Husband::pay', $this);
    }
}

class Wife implements ObserverInterface
{
    public function update($subject)
    {
        echo 'Go shopping !' . PHP_EOL;
    }
}