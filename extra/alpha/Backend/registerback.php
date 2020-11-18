<?php
require 'config.php';

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$password_c = $_POST['password_c'];


//checks if the password and confirm password matches
if ($_POST["password"] === $_POST["password_c"]) {

  // Create connection to the database
  $conn = new mysqli ($dbServername, $dbUsername, $dbPassword, $dbName);


  //hash the passwords for better security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  

  //if connection error
  if (mysqli_connect_error()){
      die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
  }

  else{
    
    //store the values into the MYSQL database
    $sql = "INSERT INTO user (firstName, lastName, userName, password) values 
    ('$firstName','$lastName', '$userName', '$hashed_password')";
  
    if ($conn->query($sql)){
      echo "New record is inserted sucessfully";
    }

    else{
      echo "Error: ". $sql ."". $conn->error;
    }
  
  }

$conn->close();

  
  
}

else {
   echo "Passwords do not match";
}



?>