<?php

namespace app\models;

use core\Auth;
use core\Model;

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
            $auth = new Auth();
            if($auth->checkUser($this->name, $this->email, $this->password)){
                return true;
            }
            $this->errors = $auth->errors;
        }

        return false;
    }
}