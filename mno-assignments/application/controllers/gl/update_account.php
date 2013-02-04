<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Update_Account extends Application {

    var $tabs = array('/gl/welcome' => 'General Ledger', '/gl/add_account' => 'Add Account', '/gl/update_account' => 'Update Account');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['pagebody'] = "gl/update_account";
        $this->data['pagetitle'] = 'Update Account';
        $this->data['selected'] = '/gl/update_account';
        $record = array('accountno' => '', 'accountname' => '', 'status' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

    function post() {
        $this->load->helper('gl/validate');
        $new_id = $_POST['accountno'];

        if (!validate_accountid($_POST['accountno'])) {
            $this->data['errors'][] = 'This Account ID does not exist';
        }
        if ($_POST['accountname'] == null) {
            $this->data['errors'][] = 'Please enter a valid name';
        }
        if (!validate_status($_POST['status'])) {
            $this->data['errors'][] = 'Please enter the status: A or D';
        }

        if (count($this->data['errors']) > 0) {
            $this->index();
        } else {
            /* All field filled, add item */
            $this->ledger->update($_POST);
            /* redirect back to main */
            redirect("../../gl/welcome");
        }
    }

}

