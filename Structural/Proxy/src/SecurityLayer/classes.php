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

class CompanyERPSecurityProxy
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
        $this->ensureRole('hr');
        $this->subject->getHumanResourceData();
    }

    public function getAccountingData()
    {
        $this->ensureRole('accounting');
        $this->subject->getAccountingData();
    }

    public function ensureRole($role)
    {
        echo 'User : ' . $this->user . PHP_EOL;
        if (!in_array($role, $this->roles[$this->user])) {
            throw new \Exception('ACCESS DENIED - Data restricted to "'. $role . '" members.');
        }
    }
}