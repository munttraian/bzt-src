<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core\Interfaces;

interface RouterInterface {
    
    /**
     * 
     * @param string $route
     * @param array $params
     */
    public function add(string $route, array $params = []);
    
    /**
     * dispatch controller action
     */
    public function dispatch(string $url);
    
}