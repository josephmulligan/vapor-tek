<?php 
include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');

//script to view all orders in the database
//results displayed as a table
//if users are regular customers they can only view their own orders

echo "<div class='container'><table class='table table-hover'>";
echo "<tr>
        <th>Placed By</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Date Placed</th>
        <th>Date Dispatched</th>
      </tr>";

$cookie_value = $_COOKIE['loggedIn'];
$admin = check_admin_status($cookie_value);
//echo $admin;

if(isset($cookie_value) && ($admin == 1 || $admin == 2)) {
  //user is an administrator or product manager
  $result = mysqli_query($conn, "SELECT * FROM orders");
  while($row = mysqli_fetch_array($result)) {
    //get order info
    $order_id = $row['orderID'];
    $user_id = $row['userID'];
    $prod_id = $row['productID'];
    $quan = $row['quantity'];
    $price = $row['totalPrice'];
    $placed = $row['datePlaced'];
    $dispatched = $row['dateDispatched'];
    //we need to get user email and product name from the respective IDs.
    $user_result = mysqli_query($conn, "SELECT email FROM users WHERE userID = '$user_id';");
    $user_row = mysqli_fetch_array($user_result);
    $user_email = $user_row['email'];

    $prod_result = mysqli_query($conn, "SELECT name FROM products WHERE productID = '$prod_id';");
    $prod_row = mysqli_fetch_array($prod_result);
    $prod_name = $prod_row['name'];

    //create the table rows now.
    echo "<tr><td>$user_email</td><td>$prod_name</td><td>$quan</td><td>$price</td><td>$placed</td><td>$dispatched</td><td>";
    
    //if the order has been invoiced then give the ability to create an invoice.
    $inv_query = "SELECT * FROM invoices WHERE orderID = '$order_id';";
    $inv_result = mysqli_query($conn, $inv_query);
    if (mysqli_num_rows($inv_result) === 0) {
      //there are no invoices for this order
      echo"<a href='create_invoice.php?id=$order_id'>Invoice</a>";
    }
    echo"</td></tr>";
  }
} else if(isset($cookie_value)) { //user is not an administrator
  //do the reverse of the admin example - first get the ID From the email address and then find orders placed by that user
  $user_result = mysqli_query($conn, "SELECT userID FROM users WHERE email = '$cookie_value';");
  $user_row = mysqli_fetch_array($user_result);
  $user_id = $user_row['userID'];
  
  //find orders placed by this user
  $ord_result = mysqli_query($conn, "SELECT * FROM orders WHERE userID = '$user_id';");
  while($row = mysqli_fetch_array($ord_result)) {
    //order information
    $prod_id = $row['productID'];
    $quan = $row['quantity'];
    $price = $row['totalPrice'];
    $placed = $row['datePlaced'];
    $dispatched = $row['dateDispatched'];

    //finally get the product name from the product ID
    $prod_name = mysqli_fetch_array(mysqli_query($conn, "SELECT name FROM products WHERE productID = '$prod_id';"))['name'];

    //create each table row
    echo "<tr><td>$cookie_value</td><td>$prod_name</td><td>$quan</td><td>$price</td><td>$placed</td><td>$dispatched</td></tr>";
  }
}
echo "</table></div>";
include('includes/footer.php');
?>