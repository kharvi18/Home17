<?php
//check conection
$connection = new mysqli("localhost", "root", "", "add_post");
if ($connection->connect_error) {
    die("connection failed: " . $connection->connect_error);
}
$connection->set_charset('utf8');
session_start();
?>