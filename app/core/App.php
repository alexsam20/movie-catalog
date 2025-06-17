<?php

namespace movie;

class App
{
    public static Registry $app;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
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
}