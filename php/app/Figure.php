<?php

namespace app;

class Figure 
{
    public int $area;
    public int $length;
    public string $color;


    public function __construct(public int $width, public int $height){
       
    }

    /**
     * @return int
     */
    public function setArea()
    {
        return $this->area = $this->width * $this->height;
    }

    /**
     * @return int
     */
    public function setLength()
    {
        return $this->length = ($this->width + $this->height) * 2;
    }

    /**
     * @return string
     */
    public function setColor()
    {
        return $this->color = 'red';
    }

  

    
}