<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Default controller for COMP4711 Lab Solutions
 */
class Welcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/ar/welcome' => 'Accounts Receivable', '/ar/add_customer' => 'Add Customer');
    

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {

        $this->data['selected'] = '/ar/welcome';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Accounts Receivable';
        $this->data['pagebody'] = 'ar/home';
        $this->data['customers'] = $this->customers->getAll_array();
        $this->render();
    }

    function add_customers() {
        
    }

}