<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vat_calculator extends CI_Model
{
    public function calculate_vat ( $products )
    {
        foreach ($products as $product) {
            $vat = ( $total * (20 / 100) );
        }
        return $vat;
    }
}