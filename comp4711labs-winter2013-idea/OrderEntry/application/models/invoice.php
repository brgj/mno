<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Contacts table.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */

class Invoice extends _Mymodel {

    // Constructor
    function __construct() {
        parent::__construct();
        $this->setTable('sales_invoice', 'id');
    }
    
 }

/* End of file contacts.php */
/* Location: application/models/contacts.php */