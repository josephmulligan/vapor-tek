<?php 
include('includes/header.php');
include('includes/nav.php');
include('includes/dbconnect.php');
include('includes/check_user.php');

echo "<div class='container'><table class='table table-hover'>";
echo "<tr>
        <th>Placed By</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Date Placed</th>
        <th>Date Dispatched</th>
      </tr>";

$result = mysqli_query($conn, "SELECT * FROM orders");
while($row = mysqli_fetch_array($result)) {
  //get order info
  $user_id = $row['userID'];
  $prod_id = $row['productID'];
  $quan = $row['quantity'];
  $price = $row['totalPrice'];
  $placed = $row['datePlaced'];
  $dispatched = $row['dateDispatched'];
  //we need to get user email and product name from the respective IDs.
  $user_result = mysqli_query($conn, "SELECT email FROM users WHERE userID = '$user_id'");
  $user_row = mysqli_fetch_array($user_result);
  $user_email = $user_row['email'];
  
  $prod_result = mysqli_query($conn, "SELECT name FROM products WHERE productID = '$prod_id'");
  $prod_row = mysqli_fetch_array($prod_result);
  $prod_name = $prod_row['name'];
  
  //create the table rows now.
  echo "
        <tr>
          <td>$user_email</td>
          <td>$prod_name</td>
          <td>$quan</td>
          <td>$price</td>
          <td>$placed</td>
          <td>$dispatched</td>
        </tr>
  ";
}

echo "</table></div>";
include('includes/footer.php');
?>