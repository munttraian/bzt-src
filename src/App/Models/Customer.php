<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Core\Model as CoreModel;

class Customer extends CoreModel {
    
    /**
     * 
     * @return int
     */
    public function getTotalNoCustomers() {
        
        $sql = 'SELECT count(id) FROM `customer`';
        $result = $this->getDBConn()->query($sql);
        
        return $result->fetchColumn();
    }
    
}