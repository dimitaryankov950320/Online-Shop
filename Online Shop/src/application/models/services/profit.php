<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profit extends CI_Model
{

    public function calcOrderProfit($order)
    {
        $profit = $order['product_price'] - $order['purchased_price'];
        $profit = $profit * $order['quantity'];
        return $profit;
    }

    public function calcOrdersProfit($orders)
    {
        foreach ($orders as $order) {
            $profit = $order['product_price'] - $order['purchased_price'];
            $profit = $profit * $order['quantity'];
        }
        return $profit;
    }

}
