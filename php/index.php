<?php 

session_start();
require __DIR__ . '/vendor/autoload.php';

use app\FormGenerator;
use app\Input;
use app\Select;
use app\Textarea;
use app\Button;



if(isset($_POST) && !empty($_POST)){
    header("Location: http://localhost:8000");
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
        $form = new FormGenerator([
            (new Input('text', 'name', ['value' => '', 'required' => 'required']))->render(),
            (new Input('text', 'email', ['value' => '']))->render(),
            (new Input('checkbox', 'check-check', ['value' => 1]))->render(),
            (new Input('radio', 'age', ['value' => 20]))->render(),
            (new Input('radio', 'age', ['value' => 30],  false))->render(),
            (new Input('radio', 'age', ['value' => 40], false))->render(),
            (new Select('services', ['id' => 'services'], ['0' => 'Select service', '1' => 'Girls', '2' => 'Drugs', '3' => 'Weapons']))->render(),
            (new Textarea('message', ['rows' => 5]))->render(),
            (new Button('submit', 'Submit', ['class' => 'btn']))->render(),
        ]); ?>

        <div class="container">
            <div class="form">
                <div class="form-title">Callback form</div>
            <?= $form->generateForm('POST', ['id' => 'callback']); ?>
            </div>
        </div>

</body>
</html>


