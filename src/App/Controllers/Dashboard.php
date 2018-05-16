<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

use Core\Controller as CoreController;
use Core\View;
use App\Models\Order;
use App\Models\Customer;

class Dashboard extends CoreController {
    
    /**
     * 
     * @return bool
     */
    protected function isAdminController(): bool {
        
        return false;
    
    }
    
    /**
     * Index Action
     */
    public function indexAction() {
        
        $view = new View();
        $view->render('dashboard.php', array('orderModel' => new Order(), 'customerModel' => new Customer()));
        
    }
    
}