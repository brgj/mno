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
class Update_invoice extends Application{
    function index() {
        $record = array('id'=>'', 'customer'=>'', 'description'=>'', 'status'=>'', 'order_date'=>'');
        $this->data = array_merge($this->data,$record);//'initializes' array to empty values so we don't see template stuff.
        $this->data['pagebody'] = "update_form";
        $this->render();
    }
    function post() {
        $this->load->helper('validation');//loads validation_helper.php (where validation functions are stored)
        $new_id = $_POST['id'];//check to see if record exists in database
        if ($this->invoice->get($new_id) == null) {
            $this->data['errors'][] = 'invoice ID doesn\'t exist.';
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
        }
        else
        {
            $this->invoice->update($_POST);//all is good add contact...
            redirect("/");//... and redirect back to main
        }
    }
}
?>
