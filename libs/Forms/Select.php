<?php

namespace libs\Forms;

use libs\Forms\FormElement;
class Select extends FormElement
{
    protected string $tagName = 'select';
    protected bool $closeTag = true;



    public function __construct(
        protected string $name,
        protected array $attributes,
        protected array $options = [],
        protected bool $label = true
    ){}

    /**
     * @return string
     */
    protected function build(): string
    {
        if($this->options){
            foreach($this->options as $value => $name){
                $this->innerTag .= "<option value=\"$value\">$name</option>";
            }

            return parent::build();
        }
        return '';
    }

    /**
     * @return string
     */
    private function options(): string
    {
        $options = '';
        foreach($this->options as $value => $name){
            $options .= "<option value=\"$value\">$name</option>";
        }
        return $options;
    }


}