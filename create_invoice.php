<?php 

/*

* Creation of invoice form for each order
* Once form is filled out the invoice is messaged to the user and put in the invoices table in the database

*/
include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');

$admin = check_admin_status($_COOKIE["loggedIn"]);

if (isset($_POST['submit'])) {//form submitted
    //get form variables
    $order_id = $_POST['order_id'];
    $notes = htmlspecialchars($_POST['notes']);

    //query database to get order
    $ord_query = "SELECT * FROM orders WHERE orderID = '$order_id';";
    $ord_result = mysqli_query($conn, $ord_query);
    $ord_row = mysqli_fetch_array($ord_result);

    //get info from order details
    $user_id = $ord_row['userID'];
    $prod_id = $ord_row['productID'];
    $total = $ord_row['totalPrice'];
    $quan = $ord_row['quantity'];

    //get user email from user id
    $user_query = "SELECT email FROM users WHERE userID = '$user_id';";
    $user_result = mysqli_query($conn, $user_query);
    $user_row = mysqli_fetch_array($user_result);

    $email = $user_row['email'];

    //get product info from product id
    $prod_query = "SELECT name FROM products WHERE productID = '$prod_id';";
    $prod_result = mysqli_query($conn, $prod_query);
    $prod_row = mysqli_fetch_array($prod_result);

    $prod_name = $prod_row['name'];
    $prod_price = $total / $quan; //this is because the total price and quantity are known
    $vat = 0.2;
    $vat_pc = $vat * 100;
    $total_after_vat = $total + ($vat * $total); //calculate vat for invoice

    //send message to user to alert them to a new invoice
    //compose invoice
    $invoice = "
    <strong>Invoice for order &#35;$order_id</strong><hr/>
    <strong>Order Details</strong><br/>
    Order: $prod_name &times; $quan &#64; &pound;$prod_price / Total: &pound;$total<br/>
    Notes: $notes";

    //call message function
    message_user($email, $invoice);

    //insert data into invoices table
    $inv_query = "INSERT INTO invoices VALUES ('NULL', '$order_id', '$notes', '0');";
    if ($conn->query($inv_query) === true) {
        echo "<p>Inserted Invoice into database</p>";
    } else {
        echo"<p>Error: ".$inv_query."<br>".$conn->error."</p>";
    }
}
?>

<!--Create form for invoice creation-->
<div class='container'>
    <form action="#" method="post">
        <div class='form-group row'>
            <label class='col-xs-2' for='order_id'>Order ID</label>
            <!--if an order id is passed in the URL then set the order ID to that ID-->
            <?php
            echo "<input class='col-xs-10' type='number' maxlength='20' name='order_id' id='order_id' value='";
            if (isset($_GET['id'])) {//id is passed in the URL
                echo $_GET['id']."' readonly ";
            } else {//id not passed
                echo "' "
            }
            echo "/>";
            ?>
        </div>
        <div class='form-group row'>
            <label class='col-xs-2' for='notes'>Notes</label>
            <textarea class='col-xs-10' type="text" maxlength="500" name='notes' id='notes'></textarea>
        </div>
        <button type='submit' name='submit' class='btn btn-success' style='display:block; width:100%;'>
            Create Invoice
        </button>
    </form>
</div>

<?php
include('includes/footer.php');
?>