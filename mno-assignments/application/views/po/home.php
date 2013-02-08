<?php

/**
 * Orders View
 * @author Chris Elder
 */
if (!defined('APPPATH'))
    exit('No direct script access allowed');
?>
<table cols="" border="0">
    <tr>
        <th>Vendor ID</th>
        <th>Vendor Name</th>
        <th>Order ID</th>
        <th></th>
        <th></th>
    </tr>
    {orders}
    <tr>
        <td>{vID}</td>
        <td>{vendor}</td>
        <td>{orderID}</td>
        <td><button class="button">Update</button></td>
        <td><button class="button">Delete</button></td>
    </tr>
    {/orders}
</table>
