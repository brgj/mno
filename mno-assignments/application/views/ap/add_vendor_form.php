<?php

    /**
     * Adds several labels and input textBoxes.
     */
    $this->load->helper('form');
    echo form_open('../../ap/add_vendor/post');

    echo form_label('ID','id');
    echo form_input('id','{id}');

    echo form_label('Description','description');
    echo form_input('description','{description}');

    echo form_label('Amount','amount');
    echo form_input('amount','{amount}');
    
    echo form_label('Status','status');
    echo form_input('status','{status}');

    echo form_label('phone','phone');
    echo form_input('phone','{phone}');

    echo form_label('email','email');
    echo form_input('email','{email}');

    echo form_submit(null, 'ok');

    echo form_close();

?>
