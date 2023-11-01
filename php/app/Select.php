<?php

namespace app;

use app\FormElement;
class Select extends FormElement
{
    public function __construct(protected $name, protected $params, protected $options = [], protected $label = true)
    {

    }

    /**
     * @return string
     */
    protected function build()
    {
        if($this->options){
            $html = '';
            if($this->label){
                $html = "<label>{$this->name}</label>";
            }

            $html .= '<select name="' . strtolower($this->name) . '" ' .  $this->getParams($this->params) . '>';
            $html .= $this->options();
            $html .= '</select>';

            return $html;
        }
        return '';
    }

    /**
     * @return string
     */
    private function options()
    {
        $options = '';
        foreach($this->options as $value => $name){
            $options .= "<option value=\"$value\">$name</option>";
        }
        return $options;
    }


}