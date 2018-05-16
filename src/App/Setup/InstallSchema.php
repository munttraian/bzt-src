<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Setup;

use Core\Model as CoreModel;

class InstallSchema extends CoreModel {
    
    public function execute() {
        
        $sql = <<<___SQL
            CREATE TABLE IF NOT EXISTS `customer` (
                `id` INT(10) not null primary key,
                `firstname` varchar(255) not null,
                `lastname` varchar(255) not null,
                `email` varchar(255) UNIQUE
            );
                
            CREATE TABLE IF NOT EXISTS `order` (
                `id` INT(10) not null primary key,
                `purchase_date` timestamp not null default current_timestamp,
                `country` varchar(100),
                `device` varchar(255),
                `customer_id` int(10) not null,
                FOREIGN KEY (`customer_id`) REFERENCES `customer`(`id`)
            );
                
            CREATE TABLE IF NOT EXISTS `order_item` (
                `id` INT(10) not null primary key,
                `order_id` INT(10) not null,
                `EAN` varchar(255) not null,
                `quantity` decimal(12,4) not null default 0,
                `price` decimal(12,4) not null default 0,
                FOREIGN KEY (`order_id`) REFERENCES `order`(`id`)
            );
            
___SQL;
        
        $this->getDBConn()->exec($sql);
                
    }
    
    
}