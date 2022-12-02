<?php
//to run this, put this repo in your xammp/htdocs folder and on 
//your browser type "http://localhost/CPSC471-Final-Project/conn.php

//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";

include('config.php');
echo "Host: ".$host."   Database: ".$database;
// Creating the connection by specifying the connection details
$conn = mysqli_connect($server_name, $user_name, $password, $database);

// Checking the  connection
if (!$conn) {
  die("loser". mysqli_connect_error());
}
echo "  yuh yuh";

$query = "SELECT * FROM airport";




?>
