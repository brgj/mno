
<?php

/*
 * View of general ledger
 * @author : Tammy Hoang & Dylan Jack
 */
?>
<table cols="" border="0" id="ledgertable">
    <tr>
        <th>Account number</th>
        <th>Account name</th>
        <th>Debit</th>
        <th>Credit</th>
        <th></th>
        <th></th>
    </tr>
    {ledger}
    <tr>
        <td>{accountno}</td>
        <td>{accountname}</td>
        <td>{debit}</td>
        <td>{credit}</td>
        <td><button class="button">Update</button></td>
        <td><button class="button">Delete</button></td>
    </tr>
    {/ledger}
>>>>>>> Stashed changes
</table>