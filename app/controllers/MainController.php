<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Main;

/** @property Main $model */
class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('Main page', 'Description', 'Keywords');
        $countries = $this->model->all();
        $this->setData(compact('countries'));
    }
}