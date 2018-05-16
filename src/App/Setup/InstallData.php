<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Setup;

use Core\Model as CoreModel;

class InstallData extends CoreModel {
    
    public function execute() {
        
        $sql = <<<___SQL
            INSERT INTO `customer` ( `id`, `firstname`, `lastname`, `email`)  
            VALUES (1, 'test1', 'test1', 'test1@test.com'),
              (2, 'test2', 'test2', 'test2@test.com'),
              (3, 'test3', 'test3', 'test3@test.com');

            INSERT INTO `order` (`id`, `country`, `device`, `customer_id`)
            VALUES (1, 'DK', 'desktop', 1),
                (2, 'DK', 'desktop', 2),
                (3, 'DK', 'desktop', 3);
                
            INSERT INTO `order_item` (`id`, `order_id`, `EAN`, `quantity`, `price`)
            VALUES (1, 1, '1111', 2, 20),
                (2, 1, '1112', 1, 30);
___SQL;
    
    }
    
}
