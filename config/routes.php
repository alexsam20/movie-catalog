<?php

use app\core\Router;

Router::addRoutes('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin',]);
Router::addRoutes('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'admin',]);

Router::addRoutes('^$', ['controller' => 'Main', 'action' => 'index']);
Router::addRoutes('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');
