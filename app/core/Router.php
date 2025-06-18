<?php

namespace app\core;

use RuntimeException;

class Router
{
    protected static array $routes = [];
    protected static array $route  = [];

    public static function addRoutes(string $regexp, array $route = []): void
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(): array
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    protected static function removeQueryString($url): string
    {
        if ($url) {
            $params = explode('?', $url);
            if (false === str_contains($params[0], '=' )) {
                return trim($params[0], '/');
            }
        }
        return '';
    }

    public static function dispatch($url): void
    {
        //$url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            /*if (!empty(self::$route['lang'])) {
                App::$app::setProperty('lang', self::$route['lang']);
            }*/
            $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
//                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);
//                $controllerObject->getModel();
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                dump(self::$route);
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
//                    $controllerObject->getView();
                } else {
                    throw new RuntimeException("Method {$controller}::{$action} not found", 404);
                }
            } else {
                throw new RuntimeException("Controller {$controller} not found", 404);
            }
        } else {
            throw new RuntimeException("Page not found", 404);
        }
    }

    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                //dump($route);
                self::$route = $route;

                return true;
            }
        }

        return false;
    }

    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }
}