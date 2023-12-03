<?php

namespace app\controllers;

use core\Application;
use app\models\LoginForm;
use core\Controller;

class ProfileController extends Controller
{
    public function actionView()
    {
        if(Application::$app->request->isPost()){
            $model = new LoginForm();
            if(!$model->checkUser(Application::$app->request->post())){
                $_SESSION['message'] = $model->getMessage();
            };
            header("Location: /profile"); die();
        }
        return $this->render('index');
    }


    public function actionLogout()
    {
            Application::$app->user->logout();
            header("Location: /profile");

    }
}