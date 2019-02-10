<?php
require('connect.php');

// data checking
$user_data = $_POST;
if (isset($user_data['goOn'])) {
    $err_arr = array();

    //user exists
    $login = trim($user_data['login']);
    $password = $user_data['password'];

    //find user into database
    $query = "SELECT * FROM users WHERE login = '$login'";
    if (mysqli_num_rows($connection->query($query)) > 0) {
        $res = $connection->query($query);
        $row_user = $res->fetch_assoc();

        //check password
        if (password_verify($password, $row_user['password'])) {
            //create session variables
            $_SESSION['loggined'] = $row_user;
            header('Location: /');
        } else {
            $err_arr[] = 'Password is wrong!';
        }
    } else {
        $err_arr[] = 'User not found!';
    }

    //errors
    if (!empty($err_arr)) {
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
    <title>New user</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
<div class="container main-block">
    <div class="row  align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h3>Enter your login and password</h3>
        </div>
    </div>
    <div class="row  align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <form method="post" action="auth.php">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <button type="submit" class="btn-submit" name="goOn">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>