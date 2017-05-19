<?php
include('includes/header.php');
include('includes/dbconnect.php');

$f_name = htmlspecialchars($_POST['first-name']);
$l_name = htmlspecialchars($_POST['last-name']);
$name = "$f_name." ".$l_name";
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);

$query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass');";
if($conn->query($query) === TRUE) {
  echo "<p class='container'>New record created. Returning to Create Page...</p>
        <p><a href='create.php'>If you are not redirected automatically, click here.</a></p>";
} else {
  echo"<p class='container'>Error: ".$query."<br>".$conn->error."</p>";
}
header("Refresh: 3, url=create.php");
include('includes/footer.php');
?>