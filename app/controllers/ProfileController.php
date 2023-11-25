<?php

namespace app\controllers;



use core\Controller;

class ProfileController extends Controller
{
    public function actionView()
    {
        return $this->render('index');
    }
}