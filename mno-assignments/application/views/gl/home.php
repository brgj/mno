<?php

/*
 * View of general ledger
 * @author : Tammy Hoang & Dylan Jack
 */
?>
<table cols="" border="0" id="ledgertable">
    <tr>
        <th>Account id</th>
        <th>Account name</th>
        <th>Status</th>
    </tr>
    {ledger}
    <tr>
        <td>{accountno}</td>
        <td>{accountname}</td>
        <td>{status}</td>
    </tr>
    {/ledger}
</table>