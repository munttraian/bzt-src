<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Core\Model as CoreModel;

class Order extends CoreModel {
    
    /**
     * 
     * @return int
     */
    public function getTotalNoOrders() {
        
        $sql = 'SELECT count(id) FROM `order` WHERE purchase_date BETWEEN DATE_SUB(now(), INTERVAL 1 MONTH) AND now()';
        $result = $this->getDBConn()->query($sql);
        
        return $result->fetchColumn();
    }
    
    /**
     * 
     * @return double
     */
    public function getRevenue() {
        
        $sql = <<<___SQL
                SELECT sum(oi.price)
                  FROM `order` o
                  JOIN `order_item` oi ON o.id = oi.order_id
                 WHERE purchase_date BETWEEN DATE_SUB(now(), INTERVAL 1 MONTH) AND now()
___SQL;
                
        $stmt = $this->getDBConn()->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchColumn();
    }
    
    /**
     * 
     * @return mixed
     */
    public function getOrderPerDay() {
        
        $sql = <<<___SQL
                SELECT DAY(o.purchase_date), sum(oi.price)
                  FROM `order` o
                  JOIN `order_item` oi ON o.id = oi.order_id
                 WHERE purchase_date BETWEEN DATE_SUB(now(), INTERVAL 1 MONTH) AND now()
                GROUP BY DAY(o.purchase_date);
___SQL;
        
        $stmt = $this->getDBConn()->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
}