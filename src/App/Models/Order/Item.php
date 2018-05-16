<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Order;

use Core\Model as CoreModel;

class Item extends CoreModel {
    
    /**
     * 
     * @param int $orderId
     * @return type
     */
    public function getItemsByOrderId(int $orderId) {
        
        $sql = 'SELECT * FROM order_items WHERE order_id = :orderId';
        $stmt = $this->getDBConn()->prepare($sql);
        $stmt->execute(array('orderId' => $orderId));
        
        $result = $stmt->fetchAll();
        
        return $result;
    }
    
}