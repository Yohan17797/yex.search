<?php
$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$method=$_SERVER["REQUEST_METHOD"];
if ($method=="GET")
{
    $id=$_GET["id"];
    $res=mysqli_query($connection,"delete from msg where id=$id");
    echo $res;
}
