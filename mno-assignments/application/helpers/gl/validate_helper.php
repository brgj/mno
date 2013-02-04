<?php

//Validate if status is valid character
function validate_account_status($status) {
    if ($status == 'a' || $status == 'A' || $status == 'd' || $status == 'D') {
        return true;
    }
    return false;
}

//Check if id is 3 characters
function validate_accountid($id) {
    if (strlen($id) == 3) {
        return true;
    }
    return false;
}

?>
