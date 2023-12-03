<?php
use libs\Forms\FormGenerator;
use libs\Forms\Input;
use libs\Forms\Button;
use core\User;

?>



<div class="page-content">
    <?php $user = new User();
    if($user->userId) : ?>
    <div class="profile">
        <h1>Profile</h1>
        <div class="profile-data">
            <div class="data-item">
                <div class="data-attr">User ID:&nbsp;</div>
                <div class="data-value"><?= $user->userId; ?></div>
            </div>
        <div class="data-item">
            <div class="data-attr">Name:&nbsp;</div>
            <div class="data-value"><?= $user->name; ?></div>
        </div>
            <div class="data-item">
                <div class="data-attr">LastName:&nbsp;</div>
                <div class="data-value"><?= $user->lastName; ?></div>
            </div>
            <div class="data-item">
                <div class="data-attr">Email:&nbsp;</div>
                <div class="data-value"><?= $user->email; ?></div>
            </div>

        </div>

    </div>
    <?php else : ?>
    <div class="form">
        <h1>Login</h1>
        <?php $form = new FormGenerator(
            [
                (new Input('text', 'name', ['value' => '', 'required' => 'required', 'class' => 'form-control']))->render(),
                (new Input('text', 'lastname', ['value' => '', 'required' => 'required', 'class' => 'form-control']))->render(),
                (new Input('text', 'email', ['value' => '', 'class' => 'form-control']))->render(),
                (new Input('text', 'password', ['value' => '', 'class' => 'form-control']))->render(),
                (new Button('submit', 'Submit', ['class' => 'btn btn-primary']))->render(),
            ]
        );

        echo $form->generateForm('POST', ['action' => '/profile']);

        ?>
        <div class="message">
            <?php if(isset($_SESSION['message'])){
                echo $_SESSION['message']; unset($_SESSION['message']);
            } ?>
        </div>
    </div>
    <?php endif; ?>
</div>






