<?php

namespace app;

abstract class FormElement
{
    abstract protected function build();

    /**
     * @return string
     */
    public function render()
    {
        return $this->build();
    }

    /**
     * @param array $params
     * @return string
     */
    protected function getParams($params)
    {
        $params = '';
        foreach($this->params as $name => $value){
            $params .= "$name=\"$value\" ";
        }
        return $params;
    }



}