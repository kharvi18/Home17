<?php
require('connect.php');

// data checking
$user_data = $_POST;
if (isset($user_data['goOn'])) {
    $err_arr = array();

    //user exists
    $login = trim($user_data['login']);
    $query = "SELECT * FROM users WHERE login = '$login'";
    if (mysqli_num_rows($connection->query($query)) > 0) {
        $err_arr[] = 'Your chosen login already exists. Select another please!';
    }

    //email exists
    $email = trim($user_data['email']);
    $query = "SELECT * FROM users WHERE email = '$email'";
    if (mysqli_num_rows($connection->query($query)) > 0) {
        $err_arr[] = 'Your chosen email already exists. Select another please!';
    }

    //password repeat
    if ($user_data['password_1'] != $user_data['password_2']) {
        $err_arr[] = 'Passwords do not match!';
    }

    //no errors
    if (empty($err_arr)) {
        $firstName = trim($user_data['firstName']);
        $lastName = trim($user_data['lastName']);
        $email = trim($user_data['email']);
        $login = trim($user_data['login']);
        $password = password_hash($user_data['password_1'], PASSWORD_DEFAULT);

        //insert data to database
        $query = "INSERT INTO users VALUES('', '$firstName', '$lastName', '$email', '$login', '$password')";
        //insert success
        if ($connection->query($query)) {
            header('Location: /');
        } else {
            $err_arr[] = 'Registration failed!';
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
    <title>New user</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container main-block">
    <div class="row  align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h3>Please fill in all fields</h3>
        </div>
    </div>
    <div class="row  align-items-center justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <form method="post" action="reg.php">
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="firstName" id="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login" id="login" required>
                </div>
                <div class="form-group">
                    <label for="password_1">Password</label>
                    <input type="password" class="form-control" name="password_1" id="password_1" required>
                </div>
                <div class="form-group">
                    <label for="password_2">Repeat password</label>
                    <input type="password" class="form-control" name="password_2" id="password_2" required>
                </div>

                <button type="submit" class="btn-submit" name="goOn">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>