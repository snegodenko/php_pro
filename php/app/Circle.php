<?php 

class Circle extends Figure 
{
    
    public int $radius = 150;
    
    protected function validate()
    {
        if($this->width != $this->height){
            $this->errors[] = 'Ширина та висота фігури повинні мати однакові показники!';
        }

        parent::validate();
    }
}