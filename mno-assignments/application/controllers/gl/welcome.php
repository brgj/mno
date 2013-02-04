<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * General Ledger controller for COMP 4711 assignment1
 * @author Tammy Hoang & Dylan Jack
 */
class Welcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/gl/welcome' => 'General Ledger', '/gl/add_account' => 'Add Account', '/gl/update_account' => 'Update Account');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Default entry point.
     * This function is to load data from the database file, in this case
     * is ledger.sql
     */
    function index() {
        $this->data['selected'] = '/gl/welcome';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - General Ledger';
        $this->data['pagebody'] = 'gl/home';
        $this->data['ledger'] = $this->ledger->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */