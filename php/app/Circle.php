<?php 

class Circle extends Figure 
{
    
    public int $radius = 150;

    /**
     * @return string
     */
    public function build()
    {
        return '<div class="figure-item" 
                            style="
                            width:' . $this->width . 'px;
                            height:' . $this->height . 'px;
                            background-color:' . $this->color . ';
                            border-radius:' . $this->radius . '%;
                        "></div>';
    }
    
    /**
     * @return
     */
    protected function validate()
    {
        if($this->width != $this->height){
            $this->errors[] = 'Ширина та висота фігури повинні мати однакові показники!';
        }

        parent::validate();
    }
}