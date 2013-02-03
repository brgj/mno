<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * General Ledger controller for COMP 4711 assignment1
 * @author Tammy Hoang & Dylan Jack
 */
class Glwelcome extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Default entry point.
     * This function is to load data from the database file, in this case
     * is ledger.sql
     */
    function index()  {
        $this->data['pagetitle'] = 'Massive Noob Obliterators';
        $this->data['pagebody'] = 'gl/glhome';
        $this->load->model('ledger');
        $this->data['ledger'] = $this->ledger->getAll_array();
        $this->render();
    }

}