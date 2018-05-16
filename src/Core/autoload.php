<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function boozt_autoload($className) {
    
    $base_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
    $filename =  $base_dir . str_replace('\\', '/' , $className) . '.php'; 
    
    if (file_exists($filename)) {
        require $filename;
    }
    
}

spl_autoload_register('boozt_autoload');