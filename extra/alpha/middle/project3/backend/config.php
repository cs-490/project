<?php

function createSQLConnection(){

  //connect to the Database
  // $dbServername = "sql1.njit.edu";
  // $dbUsername = "cll27@webhost01.arcs.njit.edu";
  // $dbPassword = "Daniela6??";
  // $dbName = "cll27";


  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "cll27";


  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    throw new Exception("Connection failed: ". mysqli_connect_error());
  }

  if (mysqli_connect_errno()){
    throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
  }

  return $conn;
}

function redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    die();
}


function clearSession(){
  session_start();

  // Unset all of the session variables.
  $_SESSION = array();

  // If it's desired to kill the session, also delete the session cookie.
  // Note: This will destroy the session, and not just the session data!
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  // Finally, destroy the session.
  session_destroy();

}
