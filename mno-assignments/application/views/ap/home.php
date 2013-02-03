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
        <th>Description/Name</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Phone</th>
        <td>E-mail</td>
    </tr>
    {vendors}
    <tr>
        <td>{id}</td>
        <td>{description}</td>
        <td>{amount}</td>
        <td>{status}</td>
        <td>{phone}</td>
        <td>{email}</td>
    </tr>
    {/vendors}
</table>