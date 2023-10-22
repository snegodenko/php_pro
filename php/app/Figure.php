<?php

class Figure 
{
    public int $area;
    public int $length;
    protected array $errors = [];
    public bool $validate = true;

    public function __construct(public $width, public $height, public $color){
        $this->validate();
        $this->calc();
    }

    /**
     * @return
     */
    protected function calc()
    {
        $this->area = $this->width * $this->height;
        $this->length = ($this->width + $this->height) * 2;
    }


    /**
    * @return bool
    */
   protected function validate()
   {
        if(!preg_match('#\d#', $this->width) || !preg_match('#\d#', $this->height)){
            $this->errors[] = 'Ширина та довжина фігури мають бути числом!';
        }

        if(!preg_match('#\#([a-fA-F]|[0-9]){3,6}#', $this->color)){
            $this->errors[] = 'Некоректний код кольору!';
        }

        if($this->errors){
            $this->validate = false;
            return false;
        }

        return true;
   }

   /**
    * @return string
    */
   public function getErrors()
   {
    if($this->errors){
        $html = '<div class="errors">';
        foreach($this->errors as $error){
            $html .= '<div class="error">' . $error . '</div>';
        }
        $html .= '</div>';
        return $html;
    }
    return '';
   }
}