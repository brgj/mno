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
        <th>Order Date</th>
    </tr>
    {orders}
    <tr>
        <td>{vID}</td>
        <td>{vendor}</td>
        <td>{orderID}</td>
        <td>{orderDate}</td>
    </tr>
    {/orders}
</table>
<a  href="/po/add_order">Add Order</a>
