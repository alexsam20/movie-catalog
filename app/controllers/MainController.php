<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        dump($this->model);
        echo __METHOD__;
    }
}