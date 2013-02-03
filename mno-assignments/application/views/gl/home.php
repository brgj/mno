<?php

/*
 * View of general ledger
 * @author : Tammy Hoang & Dylan Jack
 */
?>
<div id="ledgerheader">General Ledger</div>
<table cols="" border="0" id="ledgertable">
    <tr>
        <th>Account number</th>
        <th>Account name</th>
        <th>Debit</th>
        <th>Credit</th>
    </tr>
    {ledger}
    <tr>
        <td>{accountno}</td>
        <td>{accountname}</td>
        <td>{debit}</td>
        <td>{credit}</td>
    </tr>
    {/ledger}
</table>