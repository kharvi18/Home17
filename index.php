<?php
require('connect.php');
if (isset($_SESSION['loggined'])) {
    $loggined = $_SESSION['loggined'];
    $login = $loggined['login'];
    $firstName = $loggined['first_name'];
    $lastName = $loggined['last_name'];
}
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
        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php
            if (isset($_SESSION['loggined'])) {
                echo "<h3>Hello, " . $firstName . " " . $lastName . "</h3>";
                echo "</div></div>";
                echo "<div class='row  align-items-center justify-content-center'>";
                echo "<div class='col-xl-2 col-lg-4 col-md-4 col-sm-4'>";
                echo "<a href='add_post.php' class='btn-main'>Add post</a>";
                echo "</div>";
                echo "<div class='col-xl-2 col-lg-4  col-md-4 col-sm-4'>";
                echo "<a href='view_posts.php' class='btn-main'>View posts</a>";
                echo "</div>";
                echo "<div class='col-xl-2 col-lg-4  col-md-4 col-sm-4'>";
                echo "<a href='logout.php' class='btn-main'>Logout</a>";
                echo "</div>";
            } else { ?>
            <h3>Hello, log in or sign up to continue</h3>
        </div>
    </div>
    <div class="row  align-items-center justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
            <a href="auth.php" class="btn-main">
                Login
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4">
            <a href="reg.php" class="btn-main">
                Registration
            </a>
        </div>
    </div>
</div>
<?php } ?>

</body>
</html>