<?php

namespace app\core;

use Throwable;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline): void
    {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
    }

    public function fatalErrorHandler(): void
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    public function exceptionHandler(Throwable $e): void
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Exception ', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message = '', $file = '', $line = ''): void
    {
        file_put_contents(
            LOGS . '/error.log',
            "[" . date('Y-m-d H:i:s') . "] Message: {$message} | File: {$file} | Line: {$line}\n",
            FILE_APPEND
        );
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500): void
    {
        if (0 == $response) {
            $response = 404;
        }
        http_response_code($response);
        if (404 === $response && !DEBUG) {
            require WWW . '/errors/404.php';
            die();
        }
        if (DEBUG) {
            require WWW . '/errors/development.php';
        } else {
            require WWW . '/errors/production.php';
        }
        die();
    }
}