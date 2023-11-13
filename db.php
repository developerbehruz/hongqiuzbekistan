<?php
$servername = "localhost";
$username = "hongqiuz_hongqi-uzbekistan";
$password = "hongqi123@";
$dbname = "hongqiuz_hongqi-uzbekistan";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>