<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update_vendor
 *
 * @author Fred
 */
class update_vendor extends Application {

    var $tabs = array('/ap/welcome' => 'Accounts Payable', '/ap/add_vendor' => 'Add Vendor', '/ap/update_vendor' => 'Update Vendor');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    /**
     * Reads information from $_POST and attempts to validate it,
     * if no errors are found, the data is sent to the database
     * and the user is redirected, if errors are found, the
     * error array is accordingly populated.
     */
    function post() {
        $this->load->helper('ap/validate'); //loads validate_helper.php
        $new_id = $_POST['id'];
        if ($this->vendors->get($new_id) == null)
            $this->data['errors'][] = 'Contact ID does not exist!';

        if (!validate_phone($_POST['phone']))
            $this->data['errors'][] = 'Invalid phone number format!';

        if (!validate_email($_POST['email']))
            $this->data['errors'][] = 'Invalid email format!';

        if (count($this->data['errors']) > 0)
            $this->index();
        else {
            $this->vendors->update($_POST);
            redirect("../../ap/welcome");
        }
    }

    /**
     * Sets up the data to be displayed whenever the user is on the add vendor 
     * page.
     */
    function index() {
        $this->data['selected'] = '/ap/update_vendor';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Update Vendor';
        $this->data['pagebody'] = "ap/update_vendor";
        $record = array('id' => '', 'description' => '', 'amount' => '', 'status' => '', 'phone' => '', 'email' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

}

?>
