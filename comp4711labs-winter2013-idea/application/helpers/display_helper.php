<?php

if (!defined('APPPATH'))
    exit('No direct script access allowed');

/**
 * helpers/display_helper.php
 *
 * Useful functions to help display stuff
 *
 * @author		JLP
 * @copyright           Copyright (c) 2011, JL Parry
 * ------------------------------------------------------------------------
 */

/**
 * Retrieve the contents of a file and prepare it for browser display.
 *
 * Example usage (inside a controller method):
 *  $this->load->helper('display');
 *  $data['contents'] = display_file('./data/flights.dtd');
 *  $this->load->view('whatever',$data);
 *
 * @param string $filename  Name of the file whose contents you want to display, relative to the document root
 * @return string   The appropriately encoded text string containing that file's contents.
 */
function display_file($filename) {
    $CI = & get_instance();      // get "our" object instance reference, because this is just a function
    $CI->load->helper('file');  // load the CI file helper
    $stuff = read_file($filename);    // retrieve the requested file content
    $stuff = htmlentities($stuff);  // convert any HTML entities
    $stuff = '<code><pre>' . $stuff . '</pre></code>';  // bracket the result inside *code* and *pre* HTML elements

    return $stuff;  // whew!
}


/* End of file display_helper.php */
/* Location: ./application/helpers/display_helper.php */