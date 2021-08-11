<?php
require 'config_database.php';

if (isset($_SESSION["login"])) {
    header("location: ../dashboard/index.php");
    exit;
}
if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = $row;
            header("location: ../dashboard/index.php");
            exit;
        }
    }
    $error = true;
}
