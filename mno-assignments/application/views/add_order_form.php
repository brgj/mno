<?php

/*
 * @author Alexandra Kabak
 * PO
 * order form View
 */
    $this->load->helper('form');
    echo form_open('po/add_order/post');
    echo form_label('Vendor','vID');
    echo form_input('vID','{vID}')."\r\n";
    echo form_label('Vendor Name','vendor');
    echo form_input('vendor','{vendor}')."\r\n";
    echo form_label('Order ID', 'orderID');
    echo form_input('orderID', '{orderID}')."\r\n";
    
    echo form_submit(null, 'Submit');
    echo form_close();
    
?>

