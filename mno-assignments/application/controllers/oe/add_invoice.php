<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of add_contact
 *
 * @author Rian
 */
class Add_invoice extends Application {

    var $tabs = array('/oe/welcome' => 'Order Entry',
        '/oe/add_invoice' => 'Add Invoice', //adds 'add invoice' button to menu.
        '/oe/update_invoice' => 'Update Invoice' //adds 'update invoice' button to menu.
    );

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['selected'] = '/oe/add_invoice';
        $this->data['pagetitle'] = 'Massive Noob Obliterators - Add Invoice';
        $record = array('id' => '', 'customer' => '', 'description' => '', 'status' => '', 'order_date' => '');
        $this->data = array_merge($this->data, $record); //'initializes' array to empty values so we don't see template stuff.
        $this->data['pagebody'] = "oe/add_form";
        $this->render();
    }

    function post() {
        $this->load->helper('oe/validate'); //loads validation_helper.php (where validation functions are stored)
        $new_id = $_POST['id']; //check to see if record exists in database
        if ($this->invoice->get($new_id) != null) {
            $this->data['errors'][] = 'invoice ID already used.';
        }
        if (!validate_customer($_POST['customer'])) {
            $this->data['errors'][] = 'customer named is FUUUUCKEd. lol.';
        }
        if (!validate_status($_POST['status'])) {
            $this->data['errors'][] = 'status is FUUUUCKEd. lol.';
        }
        if (!validate_date($_POST['order_date'])) {
            $this->data['errors'][] = 'date is FUUUUCKEd. lol.';
        }
        if (count($this->data['errors']) > 0) {//if theres errors display them but don't redirect back to main
            $this->index();
        } else {
            $this->invoice->add($_POST); //all is good add contact...
            redirect("../../oe/welcome"); //... and redirect back to main
        }
    }

}

?>