<?php

namespace app;

abstract class AbstractFormGenerator
{
        abstract public function __construct(array $element);


        abstract public function generateForm(string $method, array $formAttributes);
}