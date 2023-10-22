<?php

class Square extends Figure
{
    protected function validate()
    {
        if($this->width != $this->height){
            $this->errors[] = 'Ширина та висота фігури повинні мати однакові показники!';
        }
        parent::validate();

    }
}