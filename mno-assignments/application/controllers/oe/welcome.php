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
    
    protected $options = array(// our options bar
        'Add Invoice' => '/oe/add_invoice',//adds 'add contact' button to menu.
        'Update Invoice' => '/oe/update_invoice'//adds 'add contact' button to menu.
    );

    function index() {
        $this->data['pagetitle'] = 'Order Entry';
        $this->data['pagebody'] = 'oe/home';
        $this->data['invoice'] = $this->invoice->getAll_array();
        $this->data['optionbar'] = build_menu_bar($this->options);
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */