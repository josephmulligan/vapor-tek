<?php 
  include('includes/header.php');
  include('includes/nav.php');
  include('includes/dbconnect.php');
?>
  <div class="container">

    <?php
    if(isset($_COOKIE[$cookie_name])) {
      //user is logged in, email = $cookie_value
      $email = $cookie_value;
      $prod = htmlspecialchars($_POST['product']);
      $quan = htmlspecialchars($_POST['quantity']);
      
      $prod_row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM products WHERE name = '$prod'"));
      $prod_stock = $prod_row['stock'];
      $prod_id = $prod_row['productID'];
      $prod_price = $prod_row['price'];
      if($prod_stock < $quan) {
        //too much ordered. redirect to previous page.
        echo "Error! quantity requested is too large. Please attempt to <a href='product_info.php?id=$prod_id'>order again</a>.";
      } else {
        if($quan == 0) {
          //tried to order 0 of an item.
          echo "<p>Error: Ordered 0 $prod. Returning to info page...<script>window.location.replace('product_info.php?id=$prod_id');</script>";
          break;
        }
        //remove stock from db
        $newStock = $prod_stock - $quan;
        $removeStock = "UPDATE products SET stock = $newStock WHERE productID = $prod_id";
        if($conn->query($removeStock) === FALSE) {
          echo "<p>Error: ".$removeStock."<br>".$conn->error."</p>";
          break;
        }
        //calculate total price:
        $total = $prod_price * $quan;
        echo "<h1>Price: &pound;$total</h1>";
        //get user information
        $user_row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));
        $user_id = $user_row['userID'];
        
        //create new order
        $query = "INSERT INTO orders (userID, productID, quantity, totalPrice, datePlaced, dateDispatched) VALUES ('$user_id', '$prod_id', '$quan', '$total', '".time()."', 'NULL');";
        if($conn->query($query) === TRUE) {
          echo "<p>New record created. Returning to Create Page...</p>
          <p><a href='products.php'>If you are not redirected automatically, click here.</a></p>";
        } else {
          echo"<p>Error: ".$query."<br>".$conn->error."</p>";
        }
      }
    } else {
      echo "Error! User not logged in. <a href='#' data-toggle='modal' data-target='#login'>Login</a>";
    }
  ?>
  </div>
  <?php
  include('includes/footer.php');
?>