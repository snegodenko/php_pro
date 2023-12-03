<?php

namespace app\models;

use core\Auth;
use core\Model;
use app\models\UserDb;

#[\Attributes(
    [
        'required' => ['name', 'email', 'password'],
    'email' => ['email'],
    'lengthMin' => [['name', 3], ['lastname', 3], ['password', 6]]
]
)]
class LoginForm extends Model
{
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;

    public function checkUser($data): bool
    {
        if($this->validate($data)){
            $this->loadData($data);
            $auth = new Auth($this->getUser());
            if($auth->checkUser($this->name, $this->email, $this->password)){
                return true;
            }
            $this->errors = $auth->errors;
        }

        return false;
    }

    public function getUser(): object
    {
        return new UserDb();
    }
}