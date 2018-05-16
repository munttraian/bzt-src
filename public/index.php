<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * call autoload
 */
require dirname(__DIR__) . '/src/Core/autoload.php';

$router = new Core\Router();

$router->add('/', ['controller' => 'home', 'action' => 'index']);
$router->add('/setup');
$router->add('/dashboard', ['controller' => 'dashboard', 'action' => 'index']);

$router->dispatch($_SERVER['REQUEST_URI']);