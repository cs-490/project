<?php
//connect to the Database
$dbServername = "SQL1.njit.edu";
$dbUsername = "cll27";
$dbPassword = "Daniela6??";
$dbName = "cll27";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno())
  {	  
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
else {
    echo "Successful Connection (from config.php)  ";
}
?>
