<?php


class User
{
    public $name;
    public $password;
    public $importPassword;
    public function __construct($name, $password,$importPassword)
    {
        $this->name = $name;
        $this->password = $password;
        $this->importPassword=$importPassword;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password): void
    {
        $this->password = $password;
    }

}