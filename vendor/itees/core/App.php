<?php


namespace itees;


class App {

    public static $app; // Parameters container

    protected function getParams() {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

    public function __construct() {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        //var_dump($query);

        session_start();
        self::$app = Registry::instance();

        $this->getParams();
        new ErrorHandler()
;    }

}

