<?php
include('includes/header.php');
include('includes/dbconnect.php');


//PHP code which is run on completing the contact form
//should send the form to the administrator
//admin email: colin@vapor-tek.co.uk

// POST variables (from the html form)
if (isset($_POST['name'])){
    $name = $_POST['name'];
}
if (isset($_POST['email'])){
    $email = $_POST['email'];
}
if (isset($_POST['message'])){
    $message = $_POST['message'];
}
if (!isset($_POST['callback'])){
    $callback = "no";
}else if(isset($_POST['callback'])){
    $callback = $_POST['callback'];
}
if(empty($_POST['number'])) {
    $number = "No number provided";
}else if(!empty($_POST['number'])){
    $number = $_POST['number'];
}

/*
Construct message to send
Should be in the form:

  Name: {name}
  Email: {email}

    Message

  Requested callback: {Y/N}
  Contact Number: {number}

*/

//<hr/> tags produce a horizontal line beneath the paragraph (basically a fancy <br/>)
$message = "Email: ".$email."<br/>Name: ".$name."<hr/>Message: ".$message."<hr/>Callback Requested: ".$callback."<br/>Tel.: ".$number.".";

//all contact forms should be sent to the administrator
message_user("colin@vapor-tek.co.uk", $message);
header("Location: index.php");

include('includes/footer.php');

/*

OLD CODE - updated 14/05/17

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- enables appropriate screen size adjustments-->
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
  <title>Vapor-Tek</title>

  <!-- Bootstrap -->
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link href="../bootstrap/css/custom1.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- stylesheet for social media icons -->
  <script type="text/javascript" src="../bootstrap/js/custom.js"></script>
  <!-- Javascript to redirect user to home page 5 seconds after form is submitted -->
  <script type="text/javascript">
    function Redirect() {
      window.location = "../index.html";
    }
    setTimeout('Redirect()', 5000);
  </script>

</head>

<!-- php script ============================================================================================================================================= -->
<?php
// Turn off all error reporting
error_reporting(0);

// POST variables (from the html form)
if (isset($_POST['name'])){
   $name = $_POST['name'];
}
if (isset($_POST['email'])){
   $email = $_POST['email'];
}
if (isset($_POST['message'])){
   $message = $_POST['message'];
}
if (!isset($_POST['callback'])){
   $callback = "no";
}else if(isset($_POST['callback'])){
	$callback = $_POST['callback'];
}
if(empty($_POST['number'])) {
   $number = "No number provided";
}else if(!empty($_POST['number'])){
   $number = $_POST['number'];
}
if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
	$ip = $_SERVER['REMOTE_ADDR'];
}
// define $latitude and longitude variables
$latitude = 0;
$longitude = 0;
$date = date('Y-m-d H:i:s');


// PHP location code (not very accurate)
// for commercial use need approval, address: http://ip-api.com/docs/api:serialized_php
$ip_addr = $_REQUEST['REMOTE_ADDR'];
$geo = unserialize(file_get_contents('http://ip-api.com/php/'.$ip_addr));
if($geo && $geo['status'] == 'success'){
  $latitude = $geo['lat'];
  $longitude = $geo['lon'];
} else {
  echo 'Unable to get location';
}

// Setting up a connection with a db server - variables with details of the server & mysqli object
$dbserver = "http://localhost/";
$dbusername = "root";
$dbuserpassword = "admin";
$mysqli_obj = new mysqli($dbserver,$dbusername,$dbuserpassword) or die("Couldn't connect to the dbserver.". mysqli_error());

// Connecting to a db
$dbname = "vaportek_db";
$mysqli_obj->select_db($dbname) or die("Couldn't select the remote database.". mysqli_error());

// Issing an insert into query which puts all the information into a database
$query = "INSERT INTO contact(date,name,email,message,ip,latitude,longitude,call_back,contact_number) values ('$date','$name','$email','$message','$ip','$latitude','$longitude','$callback','$number')";
$result = $mysqli_obj->query($query) or die("Couldn't write to database". mysqli_error());

// Thank you message (on success)
echo "<h3 align=center><i> Thank You! We have received your message and will respond shortly</i></h3>";
echo "<h3 align=center><i>You will now be re-directed to our home page</i></h3>";


// Email the information from the contact form
// Variables send to (recipient) and email_subject, which have fixed values
	$email_to = "redhouse2k16@gmail.com"; // email of the desired recipient
    $subject = "Vapor-Tek Contact form message"; // subject of an email

// Create email template - function
	function clean_string($string) {
		$bad = array("content-type","bcc:","to:","cc:","href");
		return str_replace($bad,"",$string);
    }
// Set the format of the email using the function above
	$message .= "<br /> First Name: ".clean_string($name)."\n";
    $message .= "<br />Telephone: ".clean_string($number)."\n";

	if($number != "null"){
		// create email headers when number supplied (set higher priority of the email)
		$headers = 'From: '.$email."\r\n".
		'Reply-To: '.$email."\r\n" .
		'X-Mailer: PHP/' . phpversion() .
		"X-Priority: 1 (Highest)\n" .
		"X-MSMail-Priority: High\n" .
		"Importance: High\n";
	}else{
		// create email headers is no contact number supplied
		$headers = 'From: '.$email."\r\n".
		'Reply-To: '.$email."\r\n" .
		'X-Mailer: PHP/' . phpversion();
	}
// Send an email to the recipient using the predefined template
	mail($email_to, $subject, $message, $headers);

// Close the connection to the database server
$mysqli_obj->close();
?>

  <!-- / php script======================================================================================================================================================= -->

  </body>

  </html>*/
?>