<?php

namespace itees;

class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    /**
     * @return array
     */
    public static function getRoutes(): array {
        return self::$routes;
    }
    /**
     * @return array
     */
    public static function getRoute(): array {
        return self::$route;
    }

    public static function dispatch($url) {
        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            //echo $controller;
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                } else {
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    public static function matchRoute($url): bool {
        foreach(self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)){
                //debug($matches);
                foreach($matches as $k => $v){
                    if (is_string($k)) $route[$k] = $v;
                }
                $route['prefix'] = isset($route['prefix']) ? $route['prefix'] . '\\' : '';
                $route['action'] = isset($route['action']) ? ($route['action']?:'index') : 'index';
                $route['controller'] = isset($route['controller']) ? ($route['controller']?:'Main') : 'Main';
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                //debug(self::$route);
                return true;
            }
        }
        return false;
    }

    private static function upperCamelCase($name) {
        $_name = ucwords(str_replace('-', ' ', $name));
        return str_replace(' ', '', $_name);
    }

    private static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }

}