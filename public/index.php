<?php

require dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'index']);
$router->add('account', ['controller' => 'Account', 'action' => 'index']);
$router->add('card', ['controller' => 'Card', 'action' => 'index']);
$router->add('cart', ['controller' => 'Cart', 'action' => 'index']);
$router->add('catalog', ['controller' => 'Products', 'action' => 'index']);

$router->dispatch($_SERVER['QUERY_STRING']);
