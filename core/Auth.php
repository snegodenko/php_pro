<?php

namespace core;

use core\User;


class Auth
{

    public array $errors = [];
    private object $userDb;


    public function __construct(object $userDb){
        $this->userDb = $userDb;
    }



    public function checkUser(string $name, string $email, string $password): bool
    {
        if(!$this->verifyName($name) || !$this->verifyPassword($password)){
            $this->errors[] = "Invalid login or password!";
        }
        if(!$this->verifyEmail($email)){
            $this->errors[] = "Invalid email!";
        }

        if($this->errors) return false;

        (new User())->setUser($this->userDb->name, $this->userDb->lastName, $this->userDb->email, $this->userDb->userId);
        return true;

    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->userDb->password);
    }


    public function verifyName(string $name): bool
    {
        return $this->userDb->name == $name;
    }

    public function verifyEmail(string $email): bool
    {
        return $this->userDb->email == $email;
    }


}