<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Contacts table.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */

class Ledger extends _Mymodel {

    // Constructor
    function __construct() {
        parent::__construct();
        $this->setTable('ledger', 'accountno');
    }

 }

/* End of file contacts.php */
/* Location: application/models/contacts.php */