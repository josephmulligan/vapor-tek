<?php
//script which is run on clicking logout
//simply sets the cookie as expired

setcookie("loggedIn", "val", time() - 120, "/");
header("Location: index.php");

////////////////////OLD CODE//////////////////////////

//	session_start();
//	//if(isset($_SESSION['username'])){
//      unset($_SESSION['username']);
//      session_destroy();//Is Used To Destroy Specified Session
//      session_unset();
//      header('location:index.php');
//      exit();
//	//}
?>