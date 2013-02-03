<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * models/properties.php
 *
 * Simple model for a hash-set-like XML properties file to hold application settings.
 *
 * This model makes a number of assumptions: the name of the properties file,
 * that there will be only one, the name of the root element, the name of child
 * elements, and the name of the attribute to use as a key field.
 *
 * @author		JLP
 * @copyright           Copyright (c) 2011, JL Parry
 * @since		Version 2.0
 * ------------------------------------------------------------------------
 *
 */
class Properties extends CI_Model {

    // Over-ride any of the following to suit your webapp
    private $_document_name = 'properties.xml'; // Which document is this a model for?
    private $_root_name = 'properties';        // name of the root element (tag)
    private $_child_name = 'property';         // name of the child elements
    private $_key_attr = 'key';   // name of the child element attribute used as a 'primary key'
    private $_folder = 'data/';   // folder this document is in
    // Do not change any of the following. They hold instance data
    private $_real_name;        // where did the document really come from
    private $_root;             // SimpleXMLElement to hold the document root
    private $_data;             // array of ordered children

    /**
     * Default constructor.
     * The document is parsed into a DOM if it exists, and an empty one
     * with the proper element name is created if the file doesn't exist.
     *
     */

    function __construct() {
        parent::__construct();

        // Determine the real location & name of the XML document
        $this->_real_name = $this->_folder . $this->_document_name;
        // is it there? if so, get it
        if (file_exists($this->_real_name))
            $this->_root = simplexml_load_file($this->_real_name);
        // if not, make an empty document
        else
            $this->_root = simplexml_load_string('<' . $this->_root_name . '/>');

        // rebuild the keys table
        $this->_data = array();
        // get the DOM root's children
        foreach ($this->_root->children() as $kid) {
            // extract the attribute value to use for indexing
            $key = (string) $kid[$this->_key_attr];
            // store this in our key table
            $this->_data[$key] = (string) $kid;
        }

        // sort the table by key
        if (count($this->_data) > 0)
            ksort($this->_data);
    }

    /**
     * Find and return a specific element in the XML document.
     *
     * @access	public
     * @param   string  the key to look for
     */
    function get($key) {
        // find it if we can
        if (isset($this->_data[$key])) {
            return $this->_data[$key];
        } else {
            return null;
        }
    }

    /**
     * Replace a key/value pair in the properties
     * @param <type> $key       the key value
     * @param <type> $value     the value associated with that key
     */
    function put($key, $value) {
        $this->_data[$key] = $value;
        ksort($this->_data);
        $this->store();
    }

    /**
     * Remove a specific property from the set
     * @param <type> $key   Key of the property to remove
     */
    function remove($key) {
        if (isset($this->_data[$key])) {
            unset($this->_data[$key]);
            $this->store();
        }
    }

    /**
     * Return the associative array of properties
     */
    function elements() {
        return $this->_data;
    }

    /**
     * Return the number of elements in this set of properties
     */
    function size() {
        return count($this->_data);
    }

    /**
     *  Recreate & save the properties file.
     */
    function store() {
        // recreate the DOM using SimpleXML
        $this->_root = simplexml_load_string('<' . $this->_root_name . '/>');
        foreach ($this->_data as $key => $value) {
            $child = $this->_root->addChild($this->_child_name,$value);
            $child[$this->_key_attr] = $key;
        }

        // save the document, nicely formatted
        $doc = new DOMDocument('1.0');
        $doc->formatOutput = true;
        $domnode = dom_import_simplexml($this->_root);
        $domnode = $doc->importNode($domnode, true);
        $domnode = $doc->appendChild($domnode);
        $doc->save($this->_real_name);
    }

}

/* End of file properties.php */
/* Location: ./application/models/properties.php */