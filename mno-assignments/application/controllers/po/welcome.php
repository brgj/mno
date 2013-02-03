<?php

/**
 * Display controller for P/O table.
 *
 * @author Chris Elder <underdog181@hotmail.com>
 */
class Welcome extends Application {

    // sets up the tabs for displaying the data
    var $tabs = array('/po/welcome' => 'Purchasing',
        '/po/add_order' => 'Add Order', //adds 'add order' button to menu.
    );

    function __construct() {
        parent::__construct();
        $this->data['tabs'] = $this->tabs;
    }

    function index() {
        $this->data['selected'] = '/po/welcome';
        $this->data['orders'] = $this->orders->getAll_array();
        $this->data['pagetitle'] = "Massive Noob Obliterators - Orders";
        $this->data['pagebody'] = "po/home";
        $this->render();
    }

}

?>
