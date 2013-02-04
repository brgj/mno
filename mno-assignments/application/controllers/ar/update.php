<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of update
 *
 * @author hp
 */
class Update extends Application {

    var $tabs = array('/ar/welcome' => 'Accounts Receivable', '/ar/add_customer' => 'Add Customer', '/ar/update' => 'Update Customer');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['pagebody'] = "ar/update";
        $this->data['pagetitle'] = 'Update Customer';
        $this->data['selected'] = '/ar/update';
        $record = array('id' => '', 'cust_name' => '', 'status' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

    function post() {
        $new_id = $_POST['id'];

        if ($this->customers->get($new_id) == null) {
            $this->data['errors'][] = 'This ID does not exist';
        }
        if ($_POST['cust_name'] == null) {
            $this->data['errors'][] = 'Please enter a Name';
        }
        if ($_POST['status'] == null) {
            $this->data['errors'][] = 'Please enter the Status';
        }

        if (count($this->data['errors']) > 0) {
            $this->index();
        } else {
            /* All field filled, add item */
            $this->customers->update($_POST);
            /* redirect back to main */
            redirect("../../ar/welcome");
        }
    }

}

