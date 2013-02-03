<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_customer
 *
 * @author hp
 */
class Add_Customer extends Application {

    var $tabs = array('/ar/welcome' => 'Accounts Receivable', '/ar/add_customer' => 'Add Customer');

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['pagebody'] = "ar/add_customer";
        $this->data['pagetitle'] = 'Add Customer';
        $this->data['selected'] = '/ar/add_customer';
        $record = array('id' => '', 'cust_name' => '', 'status' => '');
        $this->data = array_merge($this->data, $record);
        $this->render();
    }

    /*
     * Adds the entered values into the database and does some error checking
     */

    function post() {
        $new_id = $_POST['id'];
        
        if($this->customers->get($new_id) != null)
        {
            $this->data['errors'][]= 'This ID is already being used';

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
            $this->customers->add($_POST);
            /* redirect back to main */
            redirect("/ar/welcome");
        }
    }

}

