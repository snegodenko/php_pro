<?php

namespace core;

use core\User;

class Auth
{
    public string $name = 'John';

    public string $lastName = 'Smith';
    public  string $email = 'john@gmail.com';

    /**
     * @var string password_hash(123456, PASSWORD_DEFAULT)
     */
    public string $password = '$2y$10$nlxOTwVT9OcF.ls8/v.6yuzQI2t/ZiIrP/NCVm5KKrOaQnoVeTiZO';
    public int $userId = 2;

    public array $errors = [];



    public function checkUser(string $name, string $email, string $password): bool
    {
        if(!$this->verifyName($name) || !$this->verifyPassword($password)){
            $this->errors[] = "Invalid login or password!";
        }
        if(!$this->verifyEmail($email)){
            $this->errors[] = "Invalid email!";
        }

        if($this->errors) return false;

        (new User())->setUser($this->name, $this->lastName, $this->email, $this->userId);
        return true;

    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }


    public function verifyName(string $name): bool
    {
        return $this->name == $name;
    }

    public function verifyEmail(string $email): bool
    {
        return $this->email == $email;
    }


}