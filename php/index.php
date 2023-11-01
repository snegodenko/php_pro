<?php 

session_start();
require __DIR__ . '/vendor/autoload.php';

use app\FormGenerator;
use app\Input;
use app\Select;
use app\Button;

FormGenerator::validate();

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

<?php   $name = (new Input('text', 'Name', ['name' => 'name', 'value' => '']))->render();
        $email = (new Input('text', 'Email', ['name' => 'email', 'value' => '']))->render();
        $select = (new Select('Services', ['id' => 'services'], ['0' => 'Select service', '1' => 'Girls', '2' => 'drugs', '3' => 'Weapons']))->render();
        $button = (new Button('submit', 'Submit', ['class' => 'btn']))->render();
        $form = new FormGenerator([$name, $email, $select, $button]); ?>

        <div class="container">
            <div class="form">
                <div class="form-title">Callback form</div>
            <?= $form->generateForm('POST', ['id' => 'callback']); ?>
            </div>
        </div>
</body>
</html>


