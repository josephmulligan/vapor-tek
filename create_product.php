<?php 
include('includes/header.php');
include('includes/nav.php');

/*

* creation of product form
* all db querying takes place in reg_product.php

*/
?>

<!--create form, need inputs for name, description, price and stock-->
<div class="container">
    <form id="create-product" action="reg_product.php" method="post" accept-charset="UTF-8">
        <div class="form-group">
            <legend>Create Product</legend>
            <input type="hidden" name="submitted" id="submitted" value="1" />
        </div>
        <div class="form-group">
            <label for="name">Name </label>
            <input type="text" name="name" id="name" maxlength="50">
        </div>
        <div class="form-group">
            <label for="desc">Description </label>
            <input type="text" name="desc" id="desc" maxlength="500">
        </div>
        <div class="form-group">
            <label for="email">Price </label>
            <input type="number" name="price" id="price" maxlength="50">
        </div>
        <div class="form-group">
            <label for="stock">Stock </label>
            <input type="number" name="stock" id="stock" maxlength="50">
        </div>
        <button class="btn btn-success" type="submit">Create Product</button>
    </form>
</div>

<?php
include('includes/footer.php');
?>