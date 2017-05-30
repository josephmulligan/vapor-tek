<?php

//script which is run on user login
//passwords are checked against the SHA-1 hash stored in the database
//also in this file set the cookie which contains the user email, with a name loggedIn

$cookie_name = "loggedIn";
include('includes/header.php');

//connection to database
include('includes/dbconnect.php');

//login details - username and password. (password will be stored as a hash)
$user = $_POST['userId'];
$pass = $_POST['userPw'];

//hash the password using the SHA-1 hash.
$pHash = sha1(sha1($pass."salt")."salt");

//check the details against the database.
$query = "SELECT * FROM users WHERE email='$user' AND password='$pHash';";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if($count == 1) {
    $cookie_value = $user;
    setcookie($cookie_name, $cookie_value, time() + 1800, "/");
    header("location: index.php");
} else {
    header("Refresh: 5; URL=index.php#login"); // For incorrect login attempts
    echo  " <div class='container'>
                <p class='text-danger alert-danger'>Login Failed. Please enter correct login details.<br/>
                  Redirecting back to Home Page...
                </p>
              </div>";
}

include('includes/footer.php');

/////////////////OLD CODE BELOW THIS LINE///////////////////
// //   include('includes/header.php');
//
///* login form script to go here ============================================================================================================= */
//		echo "<div class='container'>
//                <div class='jumbotron alert alert-info' align='center'>
//                  Login form link running...
//                </div>
//              </div>";
//	
//		$username = $_POST['userId'];
//		$password = $_POST['userPw'];
//		
//		// Setting up a connection with a db server - variables with details of the server & mysqli object
//		$dbserver = "127.0.0.1";
//		$dbusername = "root";
//		$dbuserpassword = "";
//		$dbname = "vapor-tek-db";
//		$mysqli = mysqli_connect($dbserver,$dbusername,$dbuserpassword,$dbname) or die("Couldn't connect to the dbserver.". mysqli_error());
//		
//		// Connection for using xampp database for testing the database
//		// $dbserver = "localhost";
//		// $dbusername = "root";
//		// $dbuserpassword = "";
//		// $dbname = "vaportek_db";
//		// $mysqli = mysqli_connect($dbserver,$dbusername,$dbuserpassword,$dbname) or die("Couldn't connect to the dbserver.". mysqli_error());
//		
//		// Gets information of registered users and finds user match
//		$result = mysqli_query($mysqli, "Select * from users where email='$username' AND password='$password'");
//        $userID = mysqli_query($mysqli, "Select userID from users where email='$username' AND password='$password'");
//		
//		// Check of $query holds one record, if it does then the user's details have been found and the user is already a registered member.
//		$row_count = mysqli_num_rows($result);		
//		if ($row_count==1 && $row_count < 2)
//		{
//            //session_name("vapor-tek");
//			session_start();
//			$_SESSION['username'] = $username;
//			$_SESSION['password'] = $password;
//            $_SESSION['userID'] = $userID;
//			header("Location: secure.php"); // Send the user to the secure webpage
//		}
//		else{
//			header("Refresh: 5; URL=index.php#login"); // For incorrect login attempts
//            echo  "<div class='container'>
//			         <p class='text-danger alert-danger'>Login Failed. Please enter correct login details.<br/>
//			         Redirecting back to Home Page...</p>
//                   </div>";
//		}
//    include('includes/footer.php');
?>