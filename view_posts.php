<?php
require('connect.php');
if (isset($_SESSION['loggined'])) {
    $loggined = $_SESSION['loggined'];
    $id_user = $loggined['id_user'];
}

//find posts of current user
$query = "SELECT * FROM posts WHERE id_user = '$id_user'";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My blog</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
<div class="container main-block">
    <div class="row  align-items-center justify-content-center">
        <?php
        if (mysqli_num_rows($connection->query($query)) > 0) {
            $res = $connection->query($query);
            echo '<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <h3>Yours posts:</h3>
                </div>';
            echo '</div>';
            while ($row = $res->fetch_assoc()) {
                echo '<div class="row  justify-content-center">';
                echo '<div class="col-xl-2 col-lg-2 col-md-12 col-sm-12"><h4>' . $row['title'] . '</h4></div>';
                echo '<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">' . $row['text'] . '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h3>Posts non found</h3>
                    </div>';
        }
        ?>
    </div>
    <a href="index.php" class="btn-main">
        Home
    </a>
</div>
</body>
</html>        