
<!--Creates a view for product entry with the following fields
id       - the products id code
model    - the products model
brand    - the products associated brand
type     - the type of product
quantity - how much of the product we have

Created by Ryan Cairney, Steve Yoo
--> 
<form action="../../ic/add_inventory/post" method="post">
    <p>

        <label for="id">Product ID</label>
        <input type="text" name="id" id="id" value="{id}"/>
    </p>
    <p>

        <label for="model">Product Model</label>
        <input type="text" name="model" id="model" value="{model}"/>
    </p>
    <p>

        <label for="brand">Product Brand</label>
        <input type="text" name="brand" id="id" value="{brand}"/>
    </p>
    <p>

        <label for="type">Product Type</label>
        <input type="text" name="type" id="type" value="{type}"/>
    </p>
    <p>
        <label for="quantity">Product Quantity</label>
        <input type="text" name="quantity" id="quantity" value="{quantity}"/>
    </p>
    <input type="submit" value="OK" />
</form>

