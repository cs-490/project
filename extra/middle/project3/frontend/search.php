<?php
session_start();
// var_dump($_SESSION);
$username = $_SESSION['username'];
require_once("../backend/user_utils.php");
require_once("../backend/announcement_utils.php");


  $allResults = getAnnouncements();

  // var_dump($allResults);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- FontAwesome CSS-->
    <script src="https://kit.fontawesome.com/a72b2bc306.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles.css">

    <title>CS490 Project</title>
</head>


<body>
  <?php include('header.php')?>
  <div class="container">
    <div class="jumbotron">
      <div class="row">
        <h1 class="text-center"><?php echo "Welcome ".  $username ?></h1>
      </div>
    </div>
    <div class="col-12">
      <form>
      <div class="input-group input-group-lg">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-lg">Search For User</span>
        </div>
        <input type="text" name="search" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        <button type="submit" class="btn btn-sm btn-info" >Search</button>
      </div>
    </form>
    </div>



</div>

          <?php
          if(!empty($_GET) && !empty($_GET["search"])){
              $rows = getListOfUsersLike($_GET["search"]);
              foreach($rows as $row){
                ?>
                <div class="profileSearch">
                    <h4>Name <a href="./profile.php?user=<?php echo $row["userName"]; ?>"><?php echo $row["firstName"]." ".$row["lastName"]; ?></h4>
                    <h4><a href="./announcements.php?user=<?php echo $row["userName"]; ?>" >View Announcements</a></h4>
                </div>
                <?php
              }
          }
           ?>
      </div>
    </div>

    <div class="announcements">
        <h4>All Announcements</h4>
      <?php


      if(count($allResults) > 0 ){

        foreach($allResults as $result){

          echo  "<div class='profileSearch'>".

                      "<h4>By:" . $result['userName']. "</h4>".
                      "<p>". $result['body']. "</p>".
                      "<h4>Date:".$result['created_at']. "</h4>".
                  "</div>";
        }

      }else{
        echo "<h1>" . "No Available Announcemen" . "</h1>";
      }




       ?>

    </div>


  </div>



    <!-- JavaScript -->
    <script src="js/main.js"></script>
</body>


</html>
