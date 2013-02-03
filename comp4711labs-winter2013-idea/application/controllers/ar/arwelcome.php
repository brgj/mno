<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Default controller for COMP4711 Lab Solutions
 */
class Arwelcome extends Application {

    function __construct() {
        parent::__construct();
    }

    /**
     * Default entry point.
     * Yes, we are using view templating.
     */
    function index() {
        $this->data['pagetitle'] = 'Massive Noob Obliterators';
        $this->data['pagebody'] = 'ar/arhome';
        $this->render();
    }

}