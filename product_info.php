<?php
  include('includes/header.php');
  include('includes/nav.php');
  include('includes/dbconnect.php');
  $id = $_GET["id"];
?>

  <!--Create a table for displaying the information about the product-->


  <?php
  $query = "SELECT * FROM products WHERE productID='$id';";

  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);

  if($count == 1) {
    //product found, load information
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $desc = $row['description'];
    $price = $row['price'];
    $stock = $row['stock'];
    
    echo"
    <div class='container'>
      <div class='text-uppercase text-center'><b>Product Information: $name</b></div><br/>
      <table class='table table-hover table-responsive'>
        <tr>
          <th scope='row'>Name</th>
          <td>".$name."</td>
        </tr>
        <tr>
          <th scope='row'>Description</th>
          <td>".$desc."</td>
        </tr>
        <tr>
          <th scope='row'>Price</th>
          <td>&pound;".$price."</td>
        </tr>
        <tr>
          <th scope='row'>Stock</th>
          <td ";
    if($stock == 0) {
      echo "style='color: red;'";
    }
    echo ">".$stock."</td>
        </tr>
      </table>
    </div>
    ";
  } else {
    echo("ERROR: count = ".$count);
  }
?>
    <div class="container">
      <!--OK, so we have the information. Now let's handle order placement.-->
      <div class="text-uppercase text-center"><b>Like this product? Why not place an order?</b></div>
      <br/>
      <form action='place_order.php' method='post'>
        <div class='form-group'>
          <label for='product'>Product</label>
          <input type='text' name='product' id='product' value='<?php echo $name; ?>' readonly>
        </div>
        <div class="form-group">
          <label for='quantity'>Quantity</label>
          <input type='number' name='quantity' id='quantity' min='0' />
        </div>
        <button class="btn btn-success" type='submit' style="display: block; width: 100%;">Place Order</button>
      </form>
    </div>
    <?php
    include('includes/footer.php');
?>