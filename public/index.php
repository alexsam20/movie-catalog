<?php
/********** php -S 127.0.0.1:8000 -t public/ **********/
declare(strict_types=1);
error_reporting(-1);
date_default_timezone_set('America/New_York');

if (PHP_MAJOR_VERSION < 8) {
    die('Need php version >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';

new \movie\App();

