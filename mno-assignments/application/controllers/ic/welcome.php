<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Inventory controller for COMP4711 Assign1
 */
class Welcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/ic/welcome' => 'Inventory Control',
        '/ic/add_inventory' => 'Add Inventory', //adds 'add inventory' button to menu.
        '/ic/update_inventory' => 'Update Inventory' //adds 'update inventory' button to menu.
    );
    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {
        $this->data['selected'] = '/ic/welcome';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Inventory Control';
        $this->data['pagebody'] = 'ic/home.php';
        $this->data['inventory'] = $this->inventory->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */