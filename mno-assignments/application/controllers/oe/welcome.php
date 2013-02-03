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
    var $tabs = array('/oe/welcome' => 'Order Entry',
        '/oe/add_invoice' => 'Add Invoice', //adds 'add invoice' button to menu.
        '/oe/update_invoice' => 'Update Invoice' //adds 'update invoice' button to menu.
    );

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['selected'] = '/oe/welcome';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Order Entry';
        $this->data['pagebody'] = 'oe/home';
        $this->data['invoice'] = $this->invoice->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */