<?php
    require_once dirname(__DIR__).'/vendor/autoload.php';
    session_start();
    error_reporting(E_ALL);
    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');
    $router = new Core\Router();
    $router->add('', ['controller' => 'Home','action' => 'index']);
    $router->add('home',['controller' => 'cmsPage','action' => 'home']);
    $router->add('admin/cms/cmsPage',['namespace' => 'Admin\cms','controller'=>'cmsPage','action'=>'index']);
    $router->add('admin/{controller}',['namespace'=>'Admin','action'=>'index']);
    $router->add('{controller}/{action}');
    $router->add('admin/{controller}/{action}',['namespace' => 'Admin']);
    $router->add('admin/cms/{controller}/{action}',['namespace' => 'Admin\cms']);
    $router->add('{controller}/{action}/{id:[a-z]+}');  
    $url = $_SERVER['QUERY_STRING'];
    $router->dispatch($url);
?>