<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$order = $args['orderModel'];
$customer = $args['customerModel'];

?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    </head>
    
    <body>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th>No of orders</th>
                    <th>No of customers</th>
                    <th>Revenue</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $order->getTotalNoOrders(); ?></td>
                        <td><?= $customer->getTotalNoCustomers(); ?></td>
                        <td><?= $order->getRevenue(); ?></td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </body>
</html>

