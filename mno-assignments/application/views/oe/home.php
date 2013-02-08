<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/homepage.php
 *
 * Present the welcome page body.
 * Yes, I probably should have used CSS, but a table is so easy.
 *
 * @author		JLP
 * ------------------------------------------------------------------------
 */
?>

<table cols="" border="0">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Order Description</th>
        <th>Order Status</th>
        <th>Order Date</th>
        <th></th>
        <th></th>
    </tr>
    {invoice}
    <tr>
        <td>{id}</td>
        <td>{customer}</td>
        <td>{description}</td>
        <td>{status}</td>
        <td>{order_date}</td>
        <td><button class="button">Update</button></td>
        <td><button class="button">Delete</button></td>
    </tr>
    {/invoice}
</table>