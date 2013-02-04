<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_vendor
 *
 * @author Fred
 */
class add_vendor extends Application {

    var $tabs = array('/ap/welcome' => 'Accounts Payable', '/ap/add_vendor' => 'Add Vendor');

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
        if ($this->vendors->get($new_id) != null)
            $this->data['errors'][] = 'Contact ID already used.';

        if (!validate_phone($_POST['phone']))
            $this->data['errors'][] = 'Invalid phone number format!';

        if (!validate_email($_POST['email']))
            $this->data['errors'][] = 'Invalid email format!';

        if (count($this->data['errors']) > 0)
            $this->index();
        else {
            $this->vendors->add($_POST);
            redirect("/");
        }
    }

    /**
     * Sets up the data to be displayed whenever the user is on the add vendor 
     * page.
     */
    function index() {
        $this->data['selected'] = '/ap/add_vendor';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Add Vendor';
        $this->data['pagebody'] = "ap/add_vendor_form";
        $record = array('id' => '', 'description' => '', 'amount' => '', 'status' => '', 'phone' => '', 'email' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

}

?>
