<?php

class Calculator
{
    private int $x;
    private int $y;

    public function __construct($x, $Y)
    {
        $this->x = $x;
        $this->y = $Y;
    }

    /**
     * return integer
     */
    public function addition()
    {
        return $this->x + $this->y;
    }

    /**
     * return integer
     */
    public function subtractition()
    {
        return $this->x - $this->y;
    }

    /**
     * return integer
     */
    public function mult()
    {
        return $this->x * $this->y;
    }

    /**
     * return integer
     */
    public function dividing()
    {
        return $this->x / $this->y;
    }


    public function __destruct()
    {
        echo 'Работа калькулятора завершена';
    }
}

