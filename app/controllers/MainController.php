<?php

namespace app\controllers;
use itees\App;

class MainController extends AppController {

      public function  indexAction() {
        //debug ($this->route);
        //debug ($this->controller);
        //echo __METHOD__;

          $this->setMeta('Главная страница', 'Описание ...', 'Ключевики ...');

          //$this->setData(['name'=>'Peter', 'age'=>47]);
          $name = 'Peter'; $age = 47;
          $names = ['Peter', 'Andrey', 'Katie',];
          $this->setData(compact('name', 'age', 'names'));
      }


}