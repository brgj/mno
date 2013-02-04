<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Add_Account extends Application {

    var $tabs = array('/gl/welcome' => 'General Ledger', '/gl/add_account' => 'Add Account', '/gl/update_account' => 'Update Account');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['pagebody'] = "gl/add_account";
        $this->data['pagetitle'] = 'Add Account';
        $this->data['selected'] = '/gl/add_account';
        $record = array('accountno' => '', 'accountname' => '', 'status' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

    /*
     * Adds the entered values into the database and does some error checking
     */

    function post() {
        $this->load->helper('gl/validate');
        $new_id = $_POST['accountno'];

        if ($this->ledger->get($new_id) != null) {
            $this->data['errors'][] = 'This ID is already being used';
        }
        if ($_POST['accountname'] == null) {
            $this->data['errors'][] = 'Please enter a valid name';
        }
        if (!validate_account_status($_POST['status'])) {
            $this->data['errors'][] = 'Please enter the status: A or D';
        }

        if (count($this->data['errors']) > 0) {
            $this->index();
        } else {
            /* All field filled, add item */
            $this->ledger->add($_POST);
            /* redirect back to main */
            redirect("../../gl/welcome");
        }
    }

}

