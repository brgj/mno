<?php

/*
 * The view for adding a new customer into that data base
 * id - customer id
 * cust_name - customer name
 * status - tells you wether the customer is active or diabled. 
 */
?>
<div>
    <form action="/ar/add_customer/post" method="post">
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
</div>
