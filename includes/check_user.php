<?php
/*

  ***DEPRECATED - use check_admin_status({EMAIL ADDRESS}); (found in includes/header.php)***

  * Check the user credentials to see if they are an administrator.
  * Since the ID of the users automatically increments, the check is performed against the database.
  * TODO: Add 'admin' table which contains a list of all admin accounts and their account type.

*/
if(isset($_COOKIE[$cookie_name])) { //logged in
    include('includes/dbconnect.php');
    $query = "SELECT userID FROM users WHERE email = '$_COOKIE[$cookie_name]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $id = $row['userID'];
    if($id > 10) { //this person is not an administrator
        echo("Error: User does not have permission to access this web page. Redirecting...
          <script>window.location.replace('index.php');</script>");
        message_user("colin@vapor-tek.co.uk", "User $_COOKIE[$cookie_name] attempted to access order-viewing page.");
    }
} else { //not logged in at all.
    echo "Error: User not logged in. Redirecting...<script>window.location.replace('index.php');</script>";
}

?>