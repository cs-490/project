<?php
   include("config.php");
   
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      
      $hashed_mypassword = password_hash($mypassword, PASSWORD_DEFAULT);
      
      $sql = "SELECT * FROM user WHERE userName = '$myusername'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['userName'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername table row must be 1 row
		
      echo"$count";
   
      if($count == 1) {
      
        
         session_register("myusername");
         echo "test";
         $_SESSION['login_user'] = $myusername;
         echo "test";
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>