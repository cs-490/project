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
    <h1 id="title">CS 490 Project</h1>

    <div class="navbar">
        <a href="search.php" class="button" id="mainButtons">Search for Users</a>
    </div>

    <div class="profileMain">
        <i class="fas fa-user-circle"></i>
        <h3 id="firstName">First Name:</h3>
        <h3 id="lastName">Last Name:</h3>
        <br>
        <h3>Other Info</h3>
        <h3><a href="home.php" id="logout">Logout</a></h3>

    </div>

    <div class="profileMain">

        <div> 
            <form action="">
                <h3>Announcements</h3>
                <textarea id="postAannouncement" placeholder="Post an announcement" rows="5" cols="80" required></textarea>
            </form>
            <button type="submit">Summit</button>
        </div>

        <hr>

        <div class="displayAnnouncement">
            <h4>Example Announcement</h4>
            <hr>
        </div>

    </div>

    <!-- JavaScript -->
    <script src="js/main.js"></script>
</body>


</html>