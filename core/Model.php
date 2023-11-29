<?php

namespace core;

use Valitron\Validator;

class Model
{

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
        $v = new Validator($data);
        $v->rules($this->getRules());
        if($v->validate()){
            return true;
        } else {
            $this->errors = $v->errors();
            return false;
        }
    }

    private function getRules(): array
    {
        $attrs = (new \ReflectionClass($this))->getAttributes();
        $rules = [];
        if($attrs){
            foreach($attrs as $attr){
                $rules = $attr->getArguments()[0];
            }
        }
        return $rules;
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