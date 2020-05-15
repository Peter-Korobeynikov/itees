<?php

namespace app\controllers;

class MainController extends AppController {

      public function  indexAction() {
        debug ($this->route);
        debug ($this->controller);
        echo __METHOD__;
    }

}