<?php

/**
 * Deals with the customer scripts
 *
 * @author ED
 */
class Customers extends _Mymodel {

    /**
     * Sets up the vendors table.
     */
    function __construct() {
        parent::__construct();
        $this->setTable('customers', 'id');
    }

 }

