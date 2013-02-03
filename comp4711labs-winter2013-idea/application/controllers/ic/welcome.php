<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Inventory controller for COMP4711 Assign1
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {
        $this->data['pagetitle'] = 'COMP4711 - Winter 2013 - Lab Ideas';
        $this->data['pagebody'] = 'home';
        $this->data['inventory'] = $this->inventory->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */