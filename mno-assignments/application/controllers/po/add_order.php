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
        $record = array('vID' => '', 'vendor' => '', 'orderID' => '');
        $this->data = array_merge($this->data, $record);
        $this->data['pagetitle'] = "Massive Noob Obliterators - Add Order";
        $this->data['pagebody'] = "po/add_order_form";
        $this->render();
    }

    function post() {
        $this->orders->add($_POST);
        redirect('/orders_control');
    }

}

?>
