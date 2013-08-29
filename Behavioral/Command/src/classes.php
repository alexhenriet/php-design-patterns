<?php

interface DeploymentProcedureInterface
{
    public function execute();
}

class ProjectDeploymentProcedure implements DeploymentProcedureInterface
{
    private $tasks = [];

    public function __construct(Array $tasks)
    {
        $this->tasks = $tasks;
    }

    public function execute()
    {
        foreach($this->tasks as $task) {
            echo 'Do ' . $task . PHP_EOL;
        }
    }
}

class ProjectDeveloper
{
    public function askDeployment(TechnicalCoordinator $technicalCoordinator, ProjectDeploymentProcedure $deployment)
    {
        $technicalCoordinator->schedule($deployment);
    }
}

class TechnicalCoordinator
{
    private $operators = [];

    public function addOperator(SystemOperator $operator)
    {
        $this->operators[] = $operator;
    }

    public function schedule(DeploymentProcedureInterface $deployment)
    {
        if (empty($this->operators)) {
            throw new \Exception('At least one operator needed');
        }

        $this->operators[array_rand($this->operators)]->addToTodo($deployment);
    }
}

class SystemOperator
{
    private $name;
    private $deployments = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addToTodo(\DeploymentProcedureInterface $deployment)
    {
        $this->deployments[] = $deployment;
    }

    public function treatTodo()
    {
        if (empty($this->deployments)) {
            echo $this->name . ': Nothing to do, lucky me !' . PHP_EOL;
            return;
        }
        echo $this->name . ':' . PHP_EOL;
        $deployment = array_shift($this->deployments);
        $deployment->execute();
    }
}