<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/*
 * @author Alexandra Kabak
 * 
 * validation for PO
 */
        
/*
 * check validity of the date entered.
 * must conform to: YYYY-MM-DD
 */
function date_validation($date)
{     
     if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)){
         return true;
     }else{
         return false;
     }     
}
function orderID_validation($orderID)
{     
     if(preg_match('^[0-9]{1,10}$', $orderID)){
         return true;
     }else{
         return false;
     }     
}

?>
