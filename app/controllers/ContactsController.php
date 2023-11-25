<?php

namespace app\controllers;

use core\Application;
use core\Controller;
use app\models\ContactsForm;

class ContactsController extends Controller
{
    public function actionView()
    {
        if(Application::$request->isPost()){
            $model = new ContactsForm();
            if($model->validate(Application::$request->post())){
                $model->loadData(Application::$request->post());
            }
            $_SESSION['message'] = $model->getMessage();
            header("Location: /contacts"); die();
        }
        return $this->render('index');
    }



}