<?php

    /**
     * Returns whether or not the given phone number pattern is allowed.
     * @param type $number
     * @return TRUE if allowed, FALSE otherwise.
     */
    function validate_phone($number) {
        return preg_match("/[0-9]{7}$/", $number); 
    }
    
    /**
     * Returns whether or not the given email pattern is allowed.
     * @param type $email
     * @return TRUE if allowed, FALSE otherwise.
     */
    function validate_email($email) {
        return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^", $email);
    }
?>
