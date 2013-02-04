<?php

/**
 * Description of add_order
 *
 * @author Alexandra Kabak
 * PO
 * Adds an order
 * Order form Controller
 */
class Add_order extends Application {

    var $tabs = array('/po/welcome' => 'Purchasing',
        '/po/add_order' => 'Add Order', //adds 'add order' button to menu.
    );

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['selected'] = '/po/add_order';
        $record = array('vID'=>'', 'vendor'=>'', 'orderID'=>'','orderDate'=>'');
        $this->data = array_merge($this->data, $record);
        $this->data['pagetitle'] = "Massive Noob Obliterators - Add Order";
        $this->data['pagebody'] = "po/add_order_form";
        $this->render();
    }

    function post() {
        
        $this->load->helper('po/validation_helper');
        
        $new_id = $_POST['orderID'];
        
        if ($this->orders->get($new_id) != null)
            $this->data['errors'][] = 'Order ID already in use';
            
        if (!orderID_validation($new_id)
            $this->data['errors'][] = 'Order ID invalid';
            
        if (!date_validation($_POST['orderDate']))
            $this->data['errors'][] = 'Invalid date; Usage: YYYY/MM/DD';
        
        if(count($this->data['errors']) > 0)
            $this->index();  
        else
        {
            $this->orders->add($_POST);
            redirect('/');     
        }
    }

}

?>
