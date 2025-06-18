<?php

namespace app\core;
use Exception;

class App
{
    public static Registry $app;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($this->queryHttpString());
    }

    protected function getParams(): void
    {
        $params = require CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $name => $value) {
                if (isset($value)) {
                    self::$app::setProperty($name, $value);
                }
            }
        }
    }

    public function queryHttpString(): string
    {
        return trim(urldecode($_SERVER['REQUEST_URI']), '/');
    }
}