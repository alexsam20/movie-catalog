<?php
//var_dump($_SERVER);
define("ROOT", dirname(__DIR__));
const WWW = ROOT . '/public';
const APP = ROOT . '/app';
const CORE = ROOT . '/app/core';
const HELPERS = ROOT . '/app/core/helpers';
const CACHE = ROOT . '/tmp/cache';
const LOGS = ROOT . '/tmp/logs';
const CONFIG = ROOT . '/config';
const LAYOUT = 'movie';
const COOKIE_TIME = 3600 * 24 * 7 * 30; // 1 month
const HOME = 'http://127.0.0.1:8000';
const ADMIN = 'http://127.0.0.1:8000/admin';
const IMAGE = '/uploads';
const NO_IMAGE = '/uploads/images/no_image.jpg';
const PRODUCT_GALLERY = '/uploads/images/';
const SLIDER_PATH = '/uploads/slider/';

require_once ROOT . '/vendor/autoload.php';