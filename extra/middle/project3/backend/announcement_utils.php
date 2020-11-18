<?php
require_once("config.php");

//squl also creating a user
function createAnnouncementSQL($values){

  $statement = "
    INSERT INTO posts (user_id, body, created_at)
    VALUES ('".$values["user_id"]."', '".$values["body"]."', CURRENT_TIME());
  ";

  $conn = createSQLConnection();



  if (!mysqli_query($conn, $statement)) {
    throw new Error(mysqli_error($conn));
  }

  mysqli_close($conn);

}



function getAnnouncementsByUserId($user){
  $conn = createSQLConnection();

  $searchUsername = mysqli_real_escape_string($conn, $user);

  $statement = "


  SELECT user.user_id, user.userName, posts.user_id, posts.post_id, posts.body, posts.created_at FROM user JOIN posts ON user.user_id = posts.user_id WHERE user.userName='$searchUsername' ";

  $result = mysqli_query($conn, $statement);
  if (!$result) {
    mysqli_close($conn);
    throw new Exception(mysqli_error($conn));
  }


  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0) {
    mysqli_close($conn);
    return [];
  }
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  mysqli_close($conn);

  return $rows;

}






function getAnnouncements(){
  $conn = createSQLConnection();


  $statement = "


  SELECT user.user_id, user.userName, posts.user_id, posts.post_id, posts.body, posts.created_at FROM user JOIN posts ON user.user_id = posts.user_id ORDER BY posts.created_at DESC ";

  $result = mysqli_query($conn, $statement);
  if (!$result) {
    mysqli_close($conn);
    throw new Exception(mysqli_error($conn));
  }


  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0) {
    mysqli_close($conn);
    return [];
  }
  $rows = [];
  while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  mysqli_close($conn);

  return $rows;

}
