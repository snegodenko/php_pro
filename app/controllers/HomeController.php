<?php

namespace app\controllers;

use core\Controller;

class HomeController extends Controller
{
    public function actionView()
    {
        return $this->render('index');
    }
}