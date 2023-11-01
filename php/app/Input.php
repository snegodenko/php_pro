<?php

namespace app;

use app\FormElement;

class Input extends FormElement
{

    /**
     * @param string $type
     * @param string $name
     * @param bool $label
     * @param array $params
     */
    public function __construct(protected $type, protected $name, protected $params, protected $label = true){}

    /**
     * @return string
     */
    protected function build()
    {
        $html = '';
        if($this->label){
            $html = "<label>{$this->name}</label>";
        }

        $html .= "<input type=\"{$this->type}\" " . $this->getParams($this->params);
        $html = rtrim($html, ' ');
        $html .= '>';

        return $html;
    }



}