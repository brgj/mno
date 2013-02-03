<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Default controller for COMP4711 Lab Solutions
 */
class Arwelcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/ar/arwelcome' => 'Accounts Receivable');
    
    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {
        
        $this->data['selected'] = '/lab04/';
        $this->data['pagetitle'] = 'Massive Noob Obliterators';
        $this->data['pagebody'] = 'ar/arhome';
        $this->render();
    }
    
    function add_customers()
    {
        
    }

}