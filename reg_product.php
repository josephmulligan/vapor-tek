<?php
include('includes/header.php');
include('includes/dbconnect.php');

$name = htmlspecialchars($_POST['name']);
$desc = htmlspecialchars($_POST['desc']);
$price = htmlspecialchars($_POST['price']);
$stock = htmlspecialchars($_POST['stock']);

$query = "INSERT INTO products (name, description, price, stock) VALUES ('$name', '$desc', '$price', '$stock');";
if($conn->query($query) === TRUE) {
  echo "<p class='container'>New record created. Returning to Create Page...</p>
        <p><a href='create_product.php'>If you are not redirected automatically, click here.</a></p>";
} else {
  echo"<p class='container'>Error: ".$query."<br>".$conn->error."</p>";
}
header("Refresh: 3, url=create_product.php");
include('includes/footer.php');
?>