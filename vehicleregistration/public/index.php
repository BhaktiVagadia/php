<?php
    require_once dirname(__DIR__).'/vendor/autoload.php';
    session_start();
    error_reporting(E_ALL);
    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');
    $router = new Core\Router();
     
    $router->add('', ['controller' => 'User','action' => 'index']);
    $router->add('{controller}/{action}');
    $router->add('{controller}',['action'=>'index']);
     
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);
?>