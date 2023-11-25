<?php

namespace libs\Forms;

class FormElement
{
    protected string $tagName;
    protected string $name;
    protected array $attributes;
    protected bool $closeTag = false;
    protected string $innerTag = '';
    protected array $types = [];



    /**
     * Формує і вертає html тег форми
     * @return string
     */
    protected function build(): string
    {
        $result = '';

        if($this->label){
            $result = "<label>" . ucfirst($this->name) . "</label>";
        }
        $result .= "<{$this->tagName} ";

        if(isset($this->type) && $this->type){
            $result .= "type=\"{$this->type}\" ";
        }

        $result .= "name=\"{$this->name}\" {$this->getAttributes($this->attributes)}>";

        if($this->innerTag){
            $result .= $this->innerTag;
        }

        if($this->closeTag){
            $result .= "</{$this->tagName}>";
        }

        return $result;
    }

    /**
     * Передає html тег у конструктор форми
     * @return string
     */
    public function render(): string
    {
        return $this->build();
    }

    /**
     * Приймає массив атрибутів та повертає їх строкою
     * @param array $attributes
     * @return string
     */
    protected function getAttributes(array $attributes): string
    {
        $attr = '';
        foreach($attributes as $name => $value){
            $attr .= "$name=\"$value\" ";
        }
        return $attr;
    }


    protected function getTypeError()
    {
        $message = "Не існуючий тип поля! Класс: "  . __CLASS__ . ", Тип: " . $this->type;
        die($message);
    }

}