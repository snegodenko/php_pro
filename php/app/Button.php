<?php

namespace app;

use app\FormElement;
class Button extends FormElement
{
    /**
     * @param string $type
     * @param string $value
     * @param array $params
     */
    public function __construct(protected $type,  protected $value, protected $params = [])
    {

    }

    /**
     * @return string
     */
    protected function build()
    {
        $html = "<button type=\"{$this->type}\" ";
        if($this->params){
            $html .= $this->getParams($this->params);
        }
        $html .= ">{$this->value}</button>";

        return $html;
    }

}