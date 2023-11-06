<?php

namespace app;

use app\FormElement;
class Button extends FormElement
{
    protected string $tagName = 'button';
    protected array $types = [
        'button',
        'reset',
        'submit'
    ];


    /**
     * @param string $type
     * @param string $value
     * @param array $params
     */
    public function __construct(protected string $type,  protected string $value, protected array $attributes)
    {
        if(!in_array($this->type, $this->types)){
            $this->getTypeError();
        }
    }

    /**
     * @return string
     */
    protected function build(): string
    {
       return $result = "<button type=\"{$this->type}\" {$this->getAttributes($this->attributes)}>{$this->value}</button>";
    }




}