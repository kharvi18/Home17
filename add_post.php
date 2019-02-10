<?php
require('connect.php');
if (isset($_SESSION['loggined'])) {
    $loggined = $_SESSION['loggined'];
    $id_user = $loggined['id_user'];
}

if (isset($_POST['goOn'])) {
    $err_arr = array();

    $title = trim($_POST['title']);
    $title = htmlspecialchars($title);
    $text_post = $_POST['text_post'];
    $text_post = htmlspecialchars($text_post);

    if (empty($title)) {
        $err_arr[] = 'Please, enter title of post!';
    }

    if (empty($text_post)) {
        $err_arr[] = 'Please, enter text of post!';
    }
    if (empty($err_arr)) {
        //insert data to database
        $query = "INSERT INTO posts VALUES('', '$id_user', '$title', '$text_post')";
        //insert success
        if ($connection->query($query)) {
            $message = "Post has been added!";
        } else {
            echo "<font color='red'>ERROR. Post has not been added</font>";
        }
    } else {
        //echo errors
        $err_mess = array_shift($err_arr);
        echo "<font color='red'>" . $err_mess . "</font>";
    }
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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <form method="post" action="add_post.php">
                <?php
                if (isset($message)) {
                    echo "<h3>" . $message . "</h3>";
                }
                ?>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                </div>

                <div class="form-group">
                    <label for="text_post">Text</label>
                    <textarea class="form-control" name="text_post" id="text_post" required rows="10"></textarea>
                </div>

                <button type="submit" class="btn-submit" name="goOn">Add post</button>
            </form>
            <a href="index.php" class="btn-main">
                Home
            </a>
        </div>
    </div>
</div>
</body>
</html>