<?php

$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$method=$_SERVER["REQUEST_METHOD"];

if ($method=="GET")
{
    $action=$_GET["action"];

    if ($action=="getAllTemp")
    {
        $res=mysqli_query($connection,"select * from tempusers");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }

    else if ($action=="activateUser")
    {
        $username=$_GET["userName"];
        $res=mysqli_query($connection,"INSERT INTO `users`(`userName`, `name`, `password`, `email`) SELECT userName, `name`, `password`, `email` FROM tempusers WHERE userName = '{$username}'");
        if ($res)
        {
            $res2=mysqli_query($connection,"DELETE FROM tempusers WHERE userName = '{$username}'");
            if ($res2)
            {
                echo $res2;
            }

        }
        else
        {
            die();
        }

    }

    else if ($action=="deleteTmp")
    {
        $username=$_GET["username"];
        $res=mysqli_query($connection,"DELETE FROM `tempusers` WHERE userName='{$username}'");
        echo $res;
    }



    else if ($action=="getAll")
    {
        $res=mysqli_query($connection,"select * from users");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }

    else if ($action=="isHave")
    {
        $username=$_GET["username"];
        $res=mysqli_query($connection,"select * from users where userName='{$username}' OR name='{$username}'");
        $arr=mysqli_fetch_assoc($res);
        $array=json_encode($arr);
        echo $array;
    }
    else if ($action=="delete")
    {
        $username=$_GET["username"];
        $res=mysqli_query($connection,"DELETE FROM `users` WHERE userName='{$username}'");
        echo $res;
    }
}

else if ($method=="POST")
{
    $action=$_POST["action"];
    if ($action=="update")
    {
        $username=$_POST["username"];
        $name=$_POST["name"];
        $email=$_POST["email"];
        $res=mysqli_query($connection,"UPDATE `users` SET `name`='{$name}', `email`='{$email}' WHERE userName='{$username}'");
        echo $res;
    }
    else if ($action=="reset")
    {
        $repass="bravo123";
        $username=$_POST["username"];
        $res=mysqli_query($connection,"UPDATE `users` SET `password`='{$repass}' WHERE userName='{$username}'");
        echo $res;
    }


}