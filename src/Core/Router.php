<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

class Router implements Interfaces\RouterInterface {
    
    protected $routes;
    protected $params;

    /**
     * A simple test function
     */
    public function test() {
        echo "Router test";
    }

    /**
     * 
     * @param string $route
     * @param array $params
     */
    public function add(string $route, array $params = []) {
        
        $this->routes[$route] = $params;
        
    }
    
    /**
     * 
     * @return array
     */
    protected function getRoutes(): array {
        
        return $this->routes;
        
    }
    
    /**
     * 
     * @param string $url
     * @return bool
     */
    public function match(string $url): bool {
        
        if (isset($this->getRoutes()[$url])) {
            
            $this->params = $this->getRoutes()[$url];
            
            return true;
        }
        
        return false;
        
    }
    
    /**
     * 
     * @param string $url
     */
    public function dispatch(string $url) {
        
        if ($this->match($url)) {
            
            $params = $this->params;
            
            /* get controller and action name */
            $controllerName = 'App\Controllers\\' . ucfirst($params['controller']);
            $actionName = lcfirst($params['action']) . "Action";
            
            /* check if controller and action exists */
            $classController = new \ReflectionClass($controllerName);
            
            if (!class_exists($controllerName)) {
                throw new \Exception("Class $classController does not exists");
            } 
            
            if (!$classController->hasMethod($actionName)) {
                throw new \Exception("Class $classController has no method with name $actionName");
            }
            
            /* All good - Call controller action*/
            (new $controllerName())->$actionName();
            
        }
        else {
            
            throw new \Exception("No route found");
            
        }
        
    }
    
}