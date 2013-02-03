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
class Welcome_invoice extends Application {
    
    protected $options = array(// our options bar
        'Add Invoice' => '/add_invoice',//adds 'add contact' button to menu.
        'Update Invoice' => '/update_invoice'//adds 'add contact' button to menu.
    );

    function index() {
        $this->data['pagetitle'] = 'Order Entry';
        $this->data['pagebody'] = 'invoice';
        $this->data['invoice'] = $this->invoice->getAll_array();
        $this->data['optionbar'] = build_menu_bar($this->options);
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */