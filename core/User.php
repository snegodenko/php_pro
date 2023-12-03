<?php

namespace core;

class User
{
    public string $name;
    public string $lastName;
    public string $email;

    public int $userId = 0;


    public function __construct()
    {
        if(isset($_SESSION['user']) && $_SESSION['user']){
            $this->name = $_SESSION['user']['name'];
            $this->lastName = $_SESSION['user']['lastName'];
            $this->email = $_SESSION['user']['email'];
            $this->userId = $_SESSION['user']['userId'];
        }
    }


    public function setUser(string $name, string $lastName, string $email, string $userId): void
    {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['lastName'] = $lastName;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['userId'] = $userId;
    }

    public function logout(): void
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
    }


}