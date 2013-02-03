<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * General ledger table
 * General ledger - assignment1 
 * @author : Tammy Hoang & Dylan Jack
 * 
 */

class Ledger extends _Mymodel {

    /*
     * Constructor to load data from ledger.sql
     * ledger : ledger table
     * accountno : primary key
     */
    function __construct() {
        parent::__construct();
        $this->setTable('ledger', 'accountno');
    }

 }

/* End of file ledger.php */
/* Location: application/models/ledger.php */