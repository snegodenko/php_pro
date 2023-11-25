<?php

namespace libs\Forms;

use libs\Forms\FormElement;

class Input extends FormElement
{
    protected string $tagName = 'input';
    protected array $types = [
        'text',
        'button',
        'checkbox',
        'radio',
        'file',
        'hidden',
        'image',
        'password',
        'submit'
    ];


    /**
     * @param string $type
     * @param string $name
     * @param bool $label
     * @param array $params
     */
    public function __construct(
        protected string $type,
        protected string $name,
        protected array $attributes,
        protected bool $label = true
    ){
        if(!in_array($this->type, $this->types)){
            $this->getTypeError();
        }
    }



}