<?php

namespace app\models;

use Valitron\Validator;



class ContactsForm
{
    public $name;
    public $email;
    public $message;
    public $errors = false;


    public function loadData(array $data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }


    public function validate($data): bool
    {
        $v = $this->rules($data);
        if($v->validate()){
            return true;
        } else {
            $this->errors = $v->errors();
            return false;
        }
    }


    private function rules($data): object
    {
        $v = new Validator($data);
        $v->rule('required', ['name', 'email']);
        $v->rule('email', 'email');
        return $v;
    }


    public function errors(): string
    {
        if($this->errors){
            $html = '';
            foreach($this->errors as $item){
                foreach($item as $error){
                    $html .= '<div class="error">' . $error . '</div>';
                }
            }
            return $html;
        }
        return '';
    }


    public function success(): string
    {
        return "<div class=\"success\">Ваша форма успішно відправлена:<br> Name: {$this->name}<br> Email: {$this->email}<br> Message: {$this->message}</div>";
    }


    public function getMessage(): string
    {
        if($this->errors){
           return $this->errors();
        } else {
           return $this->success();
        }
    }



}