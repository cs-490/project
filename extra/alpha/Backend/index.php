<?php
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>

<?php
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['userName'];
        }

    } 
?>


</body>
</html>