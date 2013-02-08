<?php
/*
 * The main page of the AR section.
 */
?>
<div>
    <table cols="" border="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
        {customers}
        <tr>
            <td>{id}</td>
            <td>{cust_name}</td>
            <td>{status}</td>
            <td><button class="button">Update</button></td>
            <td><button class="button">Delete</button></td>
        </tr>
        {/customers}
    </table>
</div>
