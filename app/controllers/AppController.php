<?php

namespace app\controllers;
use app\models\AppModel;
use itees\base\Controller;

class AppController extends Controller {
    public function __construct($route) {
        parent::__construct($route);

        // Соединение с БД
        new AppModel();


    }
}