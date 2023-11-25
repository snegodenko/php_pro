<?php

use libs\Forms\FormGenerator;
use libs\Forms\Input;
use libs\Forms\Textarea;
use libs\Forms\Button;

?>

<h1>Contacts</h1>
<div class="page-content">
    <div class="form">
        <?php $form = new FormGenerator(
                [
            (new Input('text', 'name', ['value' => '', 'required' => 'required', 'class' => 'form-control']))->render(),
            (new Input('text', 'email', ['value' => '', 'class' => 'form-control']))->render(),
            (new Textarea('message', ['rows' => 5, 'class' => 'form-control']))->render(),
            (new Button('submit', 'Submit', ['class' => 'btn btn-primary']))->render(),
              ]
        );

        echo $form->generateForm('POST', ['action' => '/contacts']);

        ?>
        <div class="message">
            <?php if(isset($_SESSION['message'])){
                echo $_SESSION['message']; unset($_SESSION['message']);
            } ?>
        </div>
    </div>
</div>
