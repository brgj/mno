<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');

/**
 * controllers/welcome.php
 *
 * Entry page to the webapp.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/ap/welcome' => 'Accounts Payable', '/ap/add_vendor' => 'Add Vendor', '/ap/update_vendor' => 'Update Vendor');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Sets up the vendors information from the database.
     * Calls the parent's render function to set up
     * any other relevant information to be displayed.
     */
    function index() {
        $this->data['selected'] = '/ap/welcome';
        $this->data['pagebody'] = "/ap/home";
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Accounts Payable';
        $this->data['vendors'] = $this->vendors->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */