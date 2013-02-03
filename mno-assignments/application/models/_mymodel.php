<?php

/**
 * models/mymodel.php
 *
 * Generic domain model.
 *
 * Intended to model both a single domain entity as well as a table.
 * This is consistent with CodeIgniter's interpretation of the Active Record
 * pattern, even though some of the functions are at the table level
 * while others are at the record level :-/
 *
 * Each such model is bound to a specific database table, using a designated
 * key field as the associative array index internally.
 * 
 * @author		JLP
 * @copyright           2010-2012, James L. Parry
 * ------------------------------------------------------------------------
 */
class _Mymodel extends CI_Model {

    var $_tableName;            // Which table is this a model for a row of?
    var $_keyField;                 // name of the primary key field

    // Constructor

    function __construct() {
        parent::__construct();
        $this->_tableName = get_class($this);
    }

//---------------------------------------------------------------------------
//  Table management functions
//---------------------------------------------------------------------------
    // Load contents from & associate this object with a table
    function setTable($table, $key='id') {
        // prime our state
        $this->_tableName = $table;
        $this->_keyField = $key;
    }

    // Return the field names in this table
    function getFields() {
        return $this->db->list_fields($this->_tableName);
    }

//---------------------------------------------------------------------------
//  Record-oriented functions
//---------------------------------------------------------------------------
    // Create a new data object.
    // Only use this method if intending to create an empty record and then populate it.
    function create() {
        $names = $this->db->list_fields($this->_tableName);
        $object = array();
        foreach ($names as $name)
            $object[$name] = "";
        return (object) $object;
    }

    // Retrieve an existing DB record as an object
    function get($key) {
        $this->db->where($this->_keyField, $key);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        return $query->row();
    }

    // Retrieve an existing DB record as an associative array
    function get_array($key) {
        $this->db->where($this->_keyField, $key);
        $query = $this->db->query($this->_tableName);
        if ($query->num_rows() < 1)
            return null;
        // using a bogus iterator to get the first row
        foreach ($query->result_array() as $row)
            return $row;
    }

    // Add a record to the DB
    function add($record) {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        // update the DB table appropriately
        $key = $data[$this->_keyField];
        $object = $this->db->insert($this->_tableName, $data);
    }

    // Update a record in the DB
    function update($record) {
        // convert object to associative array, if needed
        if (is_object($record)) {
            $data = get_object_vars($record);
        } else {
            $data = $record;
        }
        // update the DB table appropriately
        $key = $data[$this->_keyField];
        $this->db->where($this->_keyField, $key);
        $object = $this->db->update($this->_tableName, $data);
    }

    // Delete a record from the DB
    function delete($key) {
        $this->db->where($this->_keyField, $key);
        $object = $this->db->delete($this->_tableName);
    }

    // Determine if a key exists
    function exists($key) {
        $this->db->where($this->_keyField, $key);
        $query = $this->db->get($this->_tableName);
        if ($query->num_rows() < 1)
            return false;
        return true;
    }

//---------------------------------------------------------------------------
//  Aggregate functions
//---------------------------------------------------------------------------
    // Return all records as an array of objects
    function getAll() {
        $this->db->order_by($this->_keyField, 'asc');
        $query = $this->db->get($this->_tableName);
        return $query->result();
    }

    // Return all records as an array of associative arrays
    function getAll_array() {
        $this->db->order_by($this->_keyField, 'asc');
        $query = $this->db->get($this->_tableName);
        return $query->result_array();
    }

    // Return all records as a result set
    function queryAll() {
        $this->db->order_by($this->_keyField, 'asc');
        $query = $this->db->get($this->_tableName);
        return $query;
    }

    // Return the # of filtered records in a table
    function countWhich($what, $which) {
        $this->db->where($what, $which);
        $query = $this->db->get($this->_tableName);
        return $query->num_rows();
    }

    // Return filtered records as a result set
    function querySome($what, $which) {
        $this->db->order_by($this->_keyField, 'asc');
        if (($what == 'period') && ($which < 9)) {
            $this->db->where($what, $which); // special treatment for period
        } else
            $this->db->where($what, $which);
        $query = $this->db->get($this->_tableName);
        return $query;
    }

    // Return the number of records in this table
    function size() {
        $query = $this->db->get($this->_tableName);
        return $query->num_rows();
    }

}



/* End of file Mymodel.php */
/* Location: application/models/mymodel.php */