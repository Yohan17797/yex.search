<?php

//echo $_POST["tags"];


$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($_POST["action"]=="getAll")
    {
        $res=mysqli_query($connection,"SELECT tagName FROM `papertag` ORDER BY tagName ASC ");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }
}
