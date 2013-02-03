<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Contacts table.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */

class Inventory extends _Mymodel {

    /**
     * Sets up the vendors table.
     */
    function __construct() {
        parent::__construct();
        $this->setTable('inventory', 'id');
    }
    
 }

/* End of file contacts.php */
/* Location: application/models/contacts.php */