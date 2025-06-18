<?php
/********** php -S 127.0.0.1:8000 -t public/ **********/

date_default_timezone_set('America/New_York');

if (PHP_MAJOR_VERSION < 8) {
    die('Need php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

new \app\core\App();

dd(\app\core\Router::getRoutes());


