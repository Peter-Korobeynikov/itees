<?php
//echo "фронт-контроллер";
//var_dump($_SERVER['QUERY_STRING']);
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

new \itees\App();

//var_dump(\itees\App::$app->getProperties());
debug(\itees\App::$app->getProperties());