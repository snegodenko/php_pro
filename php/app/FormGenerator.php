<?php

namespace app;

use app\AbstractFormGenerator;
class FormGenerator extends \app\AbstractFormGenerator
{


    /**
     * @param array $elements
     */
    public function __construct(private array $elements = [])
    {

    }

    /**
     * @param string $method
     * @param array $formParams
     * @return string
     */
    public function generateForm(string $method, array $formAttributes)
    {
        if($this->elements){
            $html = '<form method="' . $method . '" ';
            if($formAttributes){
                foreach($formAttributes as $name => $value){
                    $html .= $name . '="' . $value . '" ';
                }
            }
            $html .= '>';

            foreach($this->elements as $element){
                $html .= '<div class="form-group">' . $element . '</div>';
            }

            if(isset($_SESSION['message'])){
                $html .= $_SESSION['message'];
                unset($_SESSION['message']);
            }

            $html .= '</form>';
            return $html;
        }

        return '';
    }






}