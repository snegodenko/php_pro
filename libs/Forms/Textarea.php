<?php

namespace libs\Forms;

use libs\Forms\FormElement;

class Textarea extends FormElement
{
        protected bool $closeTag = true;
        protected string $tagName = 'textarea';

        public function __construct(protected string $name, protected array $attributes, protected bool $label = true){}


}