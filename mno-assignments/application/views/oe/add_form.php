<?php
    $this->load->helper('form');
    echo form_open('../oe/add_invoice/post');
    echo form_label('id?','id');//actual text
    echo form_input('id','{id}');//textbox
    echo form_label('Customer','customer');//...
    echo form_input('customer','{customer}');//...
    echo form_label('Order Description','description');
    echo form_input('description','{description}');
    echo form_label('Order Status','status');
    echo form_input('status','{status}');
    echo form_label('Order Date','order_date');
    echo form_input('order_date','{order_date}');
    echo form_submit(null, 'UPDATE!');//submit button
    echo form_close();
?>