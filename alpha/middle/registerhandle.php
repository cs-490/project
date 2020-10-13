<?php
require("../backend/config.php");

require("../backend/user_utils.php");
$_REGISTER_STATUS = "";

  //checking if request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['userName'];

    $conn = createSQLConnection();

    $query = "SELECT * FROM user WHERE userName='$username'";
    $result = mysqli_query( $conn, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
      echo "Username is Taken";
      redirect("./register.php");
    }

    try{
      $db_user = createUserSQL($_POST);
      if(!empty($_SESSION)){
        clearSession();
      }
      // Start the session
      session_start();
      // Set session variables
      $_SESSION["username"] = $db_user["userName"];
      redirect("./search.php");
      die();
    }catch(Exception $e){
      $_REGISTER_STATUS = $e->getMessage();
    }
  }
