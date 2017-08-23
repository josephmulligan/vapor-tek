<?php
//connection details for testing database.
$server = "localhost";
$username = "root";
$password = "";
$database = "vapor-tek-db";

//connection attempt.
$conn = mysqli_connect($server, $username, $password, $database);

//if connection failed
if(!$conn) {
    die("Database Connection Failed: ".mysqli_connect_error());
}
?>