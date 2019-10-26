<?php


$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "update") {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $username = $_POST["username"];
        $res = mysqli_query($connection, "update users set name='{$name}', email='{$email}' where userName='{$username}'");
//        header("Location:logout.php");

        echo $res . "";


    } else if ($_POST["action"] == "checkP") {
        $password = $_POST["pass"];
        $username = $_POST["userName"];
        $res = mysqli_query($connection, "select * from users where userName='{$username}'");
        $final = mysqli_fetch_assoc($res);
        if ($final["password"] == $password) {
            echo "1";
        } else {
            echo "0";
        }
    } else if ($_POST["action"] == "changePassword") {
//        var_dump($_POST);
        $username = $_POST["username"];
        $newpass = $_POST["newpassword"];
        $res = mysqli_query($connection, "UPDATE users SET password='$newpass' WHERE userName='$username'");
        if ($res=="1"){
            //You need to redirect
            header("Location:logout.php"); /* Redirect browser */
            exit();
        }

    }
}