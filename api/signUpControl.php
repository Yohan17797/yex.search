<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if ($_GET["action"] == "email") {
        $email = $_GET["email"];
        $res = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email'");
        $result = mysqli_fetch_assoc($res);
        $final = json_encode($result);
        echo $final;
    } else if ($_GET["action"] == "userName") {
        $userName = $_GET["userName"];
        $res = mysqli_query($connection, "SELECT * FROM users WHERE userName = '$userName'");
        $res2 = mysqli_query($connection, "SELECT * FROM tempusers WHERE userName = '$userName'");
        $result2 = mysqli_fetch_assoc($res2);
        $result = mysqli_fetch_assoc($res);
        if ($result == null && $result2 == null) {

            $final = json_encode($result);
            echo $final;

        } else {
            $final = 1;
            echo $final;
        }


    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $res = mysqli_query($connection, "INSERT INTO `tempusers`(`userName`, `name`, `password`, `email`) VALUES ('{$userName}','{$name}','{$password}','{$email}')");
    if (!$res) {
        mysqli_error($connection);
        echo mysqli_error($connection);
    }
    echo $res;

}
