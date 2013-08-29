<?php

class CompanyERP
{
    public function getHumanResourceData()
    {
        echo 'This is HR data' . PHP_EOL;
    }

    public function getAccountingData()
    {
        echo 'This is Accounting data' . PHP_EOL;
    }
}

class CompanyERPProxy
{
    private $subject;
    private $roles;
    private $user;

    public function __construct(CompanyERP $subject, Array $roles)
    {
        $this->subject = $subject;
        $this->roles = $roles;
    }

    public function setCurrentlyLoggedUser($user)
    {
        $this->user = $user;
    }

    public function getHumanResourceData()
    {
        echo 'User : ' . $this->user . PHP_EOL;
        if (!in_array('hr', $this->roles[$this->user])) {
            echo 'ACCESS DENIED.' . PHP_EOL;
            return;
        }
        $this->subject->getHumanResourceData();
    }

    public function getAccountingData()
    {
        echo 'User : ' . $this->user . PHP_EOL;
        if (!in_array('accounting', $this->roles[$this->user])) {
            echo 'ACCESS DENIED.' . PHP_EOL;
            return;
        }
        $this->subject->getAccountingData();
    }
}