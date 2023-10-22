<?php 

class Rectangle extends Figure 
{
    protected function validate()
    {
        if($this->width <= $this->height){
            $this->errors[] = 'Ширина фігури має бути більше ніж висота!';
        }

        parent::validate();
    }
}