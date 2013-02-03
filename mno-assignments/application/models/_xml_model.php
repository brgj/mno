<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');

/**
 * models/_xml_model.php
 *
 * Base XML model for COMP4711
 *
 * @package		GICC Backend
 * @author		JLP
 * @copyright           Copyright (c) 2009-2012, JL Parry
 * ----------------------------------------------------------------------- 
 */
class _Xml_model extends CI_Model {

    private $filename;      // the filename this model is bound to
    public $xml;            // the root SimpleXMLElement 

    /* default constructor */

    function __construct() {
        parent::__construct();
    }

    /* Extract the data from an XML document, and bind this model to it. */

    public function loadXML($filename) {
        $this->filename = $filename;
        $this->xml = simplexml_load_file($filename);
    }


}
