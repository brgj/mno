<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Default controller for COMP4711 Lab Solutions
 */
class Arwelcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/ar/arwelcome' => 'Accounts Receivable', '/ar/add_customer' => 'Add Customer');
    
    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {
        
        $this->data['selected'] = '/ar/arwelcome';
        $this->data['pagetitle'] = 'Massive Noob Obliterators';
        $this->data['pagebody'] = 'ar/arhome';
        $this->data['customers'] = $this->customers->getAll_array();
        $this->render();
    }
    
    function add_customers()
    {
        
    }

}