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
        $res=mysqli_query($connection,"select * from papers");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }

    else if ($action=="getPapersbyUserId")
    {
        $userName=$_GET["userId"];
        $sql="select * from papers where paperUserName like '%$userName%' OR paperId like '%$userName%' or paperTitle like '%$userName%' OR paperDes like '%$userName%' OR paperAuthor like '%$userName%'";
        $res=mysqli_query($connection,$sql);
//        "select * from papers where paperUserName='{$userName}' OR paperId='{$userName}' "
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }
    else if ($action=="delete")
    {
        $paperid=$_GET["paperId"];
        $res=mysqli_query($connection,"DELETE FROM `papers` WHERE paperId='{$paperid}'");
        echo $res;
    }

}

else if ($method=="POST")
{
    $action=$_POST["action"];

    if ($_POST["action"]=="update")
    {
        $paperId=$_POST["paperId"];
        $paperTitle=$_POST["title"];
        $paperDes=$_POST["des"];
        $res=mysqli_query($connection,"UPDATE `papers` SET `paperTitle`='{$paperTitle}', `paperDes`='{$paperDes}' WHERE paperId='{$paperId}'");
        echo $res;
    }
    else if ($action=="transfer")
    {
        $paperId=$_POST["paperId"];
        $userName=$_POST["username"];
        $authName=$_POST["author"];
        $paperTitle=$_POST["title"];
        $paperDes=$_POST["des"];
        $res=mysqli_query($connection,"UPDATE `papers` SET `paperUserName`='{$userName}', `paperTitle`='{$paperTitle}', `paperDes`='{$paperDes}', `paperAuthor`='{$authName}'  WHERE paperId='{$paperId}'");
        echo $res;
    }
}