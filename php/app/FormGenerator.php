<?php

namespace app;
class FormGenerator
{
    private  static $name;
    private static $email;
    private static $services;
    private static $errors = [];


    /**
     * @param array $elements
     */
    public function __construct(private $elements = [])
    {

    }

    /**
     * @param string $method
     * @param array $formParams
     * @return string
     */
    public function generateForm($method, $formParams)
    {
        if($this->elements){
            $html = '<form method="' . $method . '" ';
            if($formParams){
                foreach($formParams as $name => $value){
                    $html .= $name . '="' . $value . '" ';
                }
            }
            $html .= '>';

            foreach($this->elements as $element){
                $html .= '<div class="form-group">' . $element . '</div>';
            }

            if(isset($_SESSION['message'])){
                $html .= $_SESSION['message'];
                unset($_SESSION['message']);
            }

            $html .= '</form>';
            return $html;
        }

        return '';
    }

    /**
     * @return void
     */
    public static function validate()
    {
        if(isset($_POST) && !empty($_POST)){
            self::$name = trim(htmlspecialchars($_POST['name']));
            self::$email = trim(htmlspecialchars($_POST['email']));
            self::$services = htmlspecialchars($_POST['services']);

            if(self::$name == ''){
                self::$errors[] = 'Поле Name не може бути пустим!';
            }

            if(strlen(self::$name) < 3){
                self::$errors[] = 'Name має містити не меньше 3-х символів!';
            }

            if(!preg_match('#[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}#im', self::$email)){
                self::$errors[] = 'Не коректний Email!';
            }

            if(self::$errors){
                $message = '<div class="message">';
                foreach(self::$errors as $error){
                    $message .= '<div class="error">' . $error . '</div>';
                }
                $message .= '</div>';
            } else {
                $message = '<div class="success message">Ваша форма успішно відправлена!</div>';
            }

            $_SESSION['message'] = $message;
        }
    }

}