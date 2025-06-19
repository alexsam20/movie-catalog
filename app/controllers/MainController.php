<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('Main page', 'Description', 'Keywords');
//        $this->setData(['test' => 'Shmocic']);
    }
}