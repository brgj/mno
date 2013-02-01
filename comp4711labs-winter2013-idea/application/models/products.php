<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * models/products.php
 *
 * Encapsulation of the tourism expenditures in tourismXX.xml
 *
 * Processing is done using SimpleXML.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 *
 */
class Products extends _Mymodel{
    
    // constructor
    function __construct() {
        parent::__construct();
        $this->setTable('products','code');
    }
}

