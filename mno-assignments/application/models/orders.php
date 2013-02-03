<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Model for PO
 * Order table.
 * 
 *
 * @author  	Kabak Alexandra
 * ------------------------------------------------------------------------
 */

class Orders extends _Mymodel {

    // Constructor
    function __construct() {
        parent::__construct();
        $this->setTable('orders', 'orderID');;
    }

 }

/* End of file orders.php */
/* Location: application/models/po/orders.php */
