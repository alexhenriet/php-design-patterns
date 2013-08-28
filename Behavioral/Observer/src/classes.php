<?php

trait Subject
{
    /**
     * @var \SplObjectStorage
     */
    private $observers = null;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * @param \SplObserver $observer
     */
    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * @param \SplObserver $observer
     */
    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class Husband implements SplSubject
{
    use Subject {
        Subject::__construct as private __subjectConstruct;
    }

    public function __construct()
    {
        $this->__subjectConstruct();
    }

    public function pay()
    {
        $this->notify();
    }
}

class Wife implements SplObserver
{
    /**
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        echo 'Go shopping !' . PHP_EOL;
    }
}