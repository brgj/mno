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
class Welcome 
    extends Application 
{

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Sets up the vendors information from the database.
     * Calls the parent's render function to set up
     * any other relevant information to be displayed.
     */
    function index() {
        $this->data['pagebody'] = "homepage";
        $this->data['vendors'] = $this->vendors->getAll_array();
        $this->render();
    }

}

/* End of file welcome.php */
/* Location: application/controllers/welcome.php */