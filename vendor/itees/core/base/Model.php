<?php

namespace itees\base;

use itees\Db;

abstract class Model {

    public $attributies = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        // Создаем синглетон Db и соединяемся с БД (в конструкторе)
        Db::instance();

    }

}