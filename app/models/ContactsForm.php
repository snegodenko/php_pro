<?php

namespace app\models;

use core\Model;
use core\Attributes;


#[Attributes(['required' => ['name', 'email'], 'email' => ['email'], 'lengthMin' => [['name', 3]]])]
class ContactsForm extends Model
{
    public $name;
    public $email;
    public $message;


}