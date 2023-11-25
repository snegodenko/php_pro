<?php

namespace core;

class Responce
{
    public function setCode(int $code): int
    {
        return http_response_code($code);
    }


}