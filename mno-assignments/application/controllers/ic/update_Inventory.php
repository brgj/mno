<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update_Inventory
 *
 * @author Ryan
 */
class Update_inventory {
    // sets up the tabs for displaying the data
    var $tabs = array(
        '/ic/welcome' => 'Inventory Control',
        'ic/add_inventory' => 'Add Inventory',
        'ic/update_inventory' => 'Update Inventory');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Update Inventory';
        $this->data['pagebody'] = "update_inventory";
        /* Sets defualt valuse to blank so it looks pretty */
        $record = array('id' => '', 'model' => '', 'brand' => '', 'type' => '', 'quantity' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

    /**
     * Post the data to the database
     * Does some error checking to 
     */
    function post() {

        $new_id = $_POST['id'];
        /* check to see if product exists in database */
        if ($this->inventory->get($new_id) == null) {
            $this->data['errors'][] = 'Product ID not found.';
        }
        /* Check that somthing is enterd */
        if ($_POST['model'] == null) {
            $this->data['errors'][] = 'Product Model field cannot be empty.';
        }
        /* Check that somthing is enterd */
        if ($_POST['brand'] == null) {
            $this->data['errors'][] = 'Product Brand field cannot be empty.';
        }
        /* Check that somthing is enterd */
        if ($_POST['type'] == null) {
            $this->data['errors'][] = 'Product Type field cannot be null.';
        }
        /* Check we don have a negative value or nothing */
        if ($_POST['quantity']) {
            $this->data['errors'][] = 'Product Type field cannot be empty.';
        }

        /* display errors, don't redirect back to main */
        if (count($this->data['errors']) > 0) {
            $this->index();
        } else {
            /* All field filled, add item */
            $this->inventory->update($_POST);
            /* redirect back to main */
            redirect("/");
        }
    }

}

?>
