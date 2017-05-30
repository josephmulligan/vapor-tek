<?php
//register user in the database
include('includes/header.php');
include('includes/dbconnect.php');

//prevent XSS attacks using htmlspecialchars
$f_name = htmlspecialchars($_POST['first-name']);
$l_name = htmlspecialchars($_POST['last-name']);
$name = "$f_name $l_name";
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);
$phash = sha1(sha1($pass."salt")."salt");
//store password as a hash using the SHA-1 hash
$admin_type = $_POST['admin_type'];

//get input from the dropdown list and create admin variable
switch ($admin_type) {
    case 'customer':
        $admin = 0;
        break;
    case 'admin':
        $admin = 1;
        break;
    case 'prod_man':
        $admin = 2;
        break;
    case 'acc_admin':
        $admin = 3;
        break;
}

//create query based on form input
$query = "INSERT INTO users (name, email, password, admin_type) VALUES ('$name', '$email', '$phash', '$admin');";
if($conn->query($query) === TRUE) {//record created
    echo "<p class='container'>New record created. Returning to Create Page...</p>
        <p><a href='create.php'>If you are not redirected automatically, click here.</a></p>";
} else {
    echo"<p class='container'>Error: ".$query."<br>".$conn->error."</p>";
}
//return to creation page
header("Refresh: 3, url=create.php");
include('includes/footer.php');
?>