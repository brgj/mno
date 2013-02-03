<?php

/*
 * view to display the update form.
 */
?>
<form action ="/ar/update/post" method="post">
    <p>
        <label for="id">Customer ID</label>
        <input type="text" name="id" id="id" value="{id}"/>
    </p>
    <p>

        <label for="cust_name">Name</label>
        <input type="text" name="cust_name" id="cust_name" value="{cust_name}"/>
    </p>
    <p>

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{status}"/>
    </p>

    <input type="submit" value="OK" />
</form>
</form>