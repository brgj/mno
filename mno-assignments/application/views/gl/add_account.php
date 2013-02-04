<?php

/*
 *accountid     - accounts id
 *accountname   - the account name
 *status        - status of the account
 */
?>

<form action="../../gl/add_account/post" method="post">
    <p>
        <label for="accountno">Account ID</label>
        <input type="text" name="accountno" id="accountno" value="{accountno}"/>
    </p>
    
    <p>
        <label for="accountname">Account Name</label>
        <input type="text" name="accountname" id="accountname" value="{accountname}"/>
    </p>
    
    <p>
        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{status}"/>
    </p>
    
    <input type="submit" value="OK" />
    
</form>