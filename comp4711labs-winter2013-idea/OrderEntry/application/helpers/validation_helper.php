<?php

function validate_id($id)
{
    if(strlen($id) == 3)
    {
        return true;
    }
    return false;
}

function validate_customer($cust)
{
    if(is_numeric($cust))
    {
        return true;
    }
    return false;
}

function validate_status($status)
{
    if(strlen($status) == 1 && ctype_alpha($status))
    {
        return true;
    }
    return false;
}

function validate_date($date)
{
    //19/20##.1-12.1-31
    //change 19 or 20 if you want to include more.
    //19 = 1900s 20 = 2000s. \d\d is ## so 19## or 20##
    $regex = '/^(19|20)\d\d[.]\d\d[.]\d\d$/';
    if(preg_match($regex, $date))
    {
        return true;
    }
    return false;
}

?>
