<?php

/*

* Header.php
* This file contains the beginning of every page on the site.
* Each file will contain a link to this file and so this code will run at the beginning of every page.
* The cookie timer is set in this file, allowing users 30 minutes to spend on each page before they will be timed out
* Functions are also defined in this file, the functions message_user and check_admin_status are defined here
* Finally, the HTML code is initialised, and all libraries are linked, 
* as well as the banner at the top of the screen when the page loads

*/

/***************OLD CODE***************************
  session_start();
  if(isset($_SESSION['username'])) {
    echo($_SESSION['username']);
  }
  echo($_SESSION['username']);
  if(isset($_SESSION['times'])) {
    $_SESSION['times']++;
    if($_SESSION['times'] > 1) {
      session_start();
    }
  }
****************************************************/
//check the cookie
$cookie_name = "loggedIn";

if(isset($_COOKIE[$cookie_name])) {
    $cookie_value = $_COOKIE[$cookie_name];
    //echo "Welcome $cookie_value!";
    //set the cookie to give the user 30 minutes each time they click on a page.
    setcookie($cookie_name, $cookie_value, time() + 1800, "/");
}

//ability to send messages between users.
function message_user($recip, $message) {
    include('includes/dbconnect.php');

    $sender = $_COOKIE["loggedIn"];
    //echo date('Y-m-d H:i:s', time());

    //check recipient exists
    $query = "select * from users where email = '$recip';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $query = "INSERT INTO MESSAGES (user_from, user_to, message, time_sent) VALUES ('$sender', '$recip', '$message', '".date('d-m-Y H:i:s', time())."');";
        if($conn->query($query) === TRUE) {
            echo "<p>Message sent.</p>";//TODO: Make this a closable popup.
        } else {
            echo "<p>Error: Message couldn't be sent.".$conn->error."</p>";
        }
    } else {
        echo "<p>Error: Recipient not found / Empty message. Check your spelling!</p>";
    }

}

//check the account status of the logged in user
function check_admin_status($u) {
    include('includes/dbconnect.php');

    /*
DEPRECATED 
  //  first, get id from user
  //  $get_user_id = "SELECT userID FROM users WHERE email = '$u';";
  //  $id_result = mysqli_query($conn, $get_user_id);
  //  $userid = mysqli_fetch_array($id_result);
  //  $id = $userid[0];
*/

    //get admin type
    $get_admin_type = "SELECT admin_type FROM users WHERE email = '$u';";
    $admin_result = mysqli_query($conn, $get_admin_type);
    $admin_type = mysqli_fetch_array($admin_result);
    //if($admin_type[0] == NULL) {
    //  $admin_type[0] = 0;
    //}
    //echo "<p>".$admin_type[0]."</p>";
    return $admin_type[0];
}

//message_user("colin@vapor-tek.co.uk", "wow!!!");

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- enables appropriate screen size adjustments-->
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Vapor-Tek Home</title>
        <link rel="shortcut icon" href="res/favicon.ico" type="image/x-icon" />
        <!-- Bootstrap * * * * * * * * * * * * * * * * * * * * -->
        <link href="libraries/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- stylesheet for social media icons -->
        <link rel="stylesheet" href="libraries/font-awesome/css/font-awesome.min.css">

        <!-- Custom Links * * * * * * * * * * * * * * * * * * * * -->
        <link rel="stylesheet" type="text/css" href="libraries/bootstrap/css/custom.css">
        <!-- link rel="stylesheet" type="text/css" href="css/custom1.css" -->

        <script src="includes/bootstrap/js/jquery.min.js"></script>
    </head>


    <!-- HEAD | BODY SEPARATION = = = = = = = = = = = = = = = = = = = = = =  -->

    <body>
        <!--  jQuery function - if 'callback' checkbox ticked = display additional input for contact number -->


        <!-- Header - Logo of Vapor-Tek * * * * * * * * * * * * * * * * * * * * -->
        <div class="container" id="company-logo">
            <div id="header1">
                <!-- Vapor-Tek Logo -->
                <div class="container-fluid">
                    <a href="feature-list.php">
                        <img id="brand-image" src="res/logoBlue.png" alt="Website Logo" width="208" height="40" />
                    </a>
                </div>
            </div>
            <div id="header2">
                <!-- Border 1 -->
            </div>
            <div id="header3">
                <!-- Border 2 -->
            </div>
        </div>