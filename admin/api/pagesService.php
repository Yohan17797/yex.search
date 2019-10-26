<?php
$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$method=$_SERVER["REQUEST_METHOD"];

if ($method=="GET")
{
    $action=$_GET["action"];
    if ($action=="getAll")
    {
        $res=mysqli_query($connection,"select * from pages ORDER BY dateAndTime DESC, pageId ASC");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }

    else if ($action=="delete")
    {
        $pageid=$_GET["pageid"];
        $res=mysqli_query($connection,"DELETE FROM `pages` WHERE `pages`.`pageId` = '$pageid'");
        echo $res;
    }
    else if ($action=="changeStatus")
    {
        $pageid=$_GET["pageid"];
        $status=$_GET["status"];
        $res2=mysqli_query($connection,"UPDATE `pages` SET `status` = '$status' WHERE `pages`.`pageId` = '$pageid'");
        echo $res2;
    }

    else if ($action=="getPapersbyUserId")
    {
        $userName=$_GET["userId"];
        $sql="select * from pages where paperId like '%$userName%' OR pageId LIKE '%$userName%'";
//        "select * from pages where paperId='{$userName}' OR pageId='{$userName}'
        $res=mysqli_query($connection,$sql);
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }
}
