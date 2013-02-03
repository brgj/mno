<?php


/**
 * Description of add_order
 *
 * @author Alexandra Kabak
 * PO
 * Adds an order
 * Order form Controller
 */
class Add_order extends Application{
    
    function index()
    {
        $record = array('vID'=>'', 'vendor'=>'', 'orderID'=>'');
        $this->data = array_merge($this->data,$record);
        $this->data['pagetitle'] = "Add Order";
        $this->data['pagebody'] = "po/add_order_form";
        $this->render();
    }
    
    function post()
    {        
        $this->orders->add($_POST);
        redirect("/");     
    }
    
    
}

?>
