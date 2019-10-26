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
        $res=mysqli_query($connection,"SELECT * FROM `papertag` ORDER BY `paperId` ASC");
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }

    else if ($action=="delete")
    {
        $tagid=$_GET["tagid"];
        $res=mysqli_query($connection,"DELETE FROM `papertag` WHERE tagId='{$tagid}'");
        echo $res;
    }
    else if ($action=="update")
    {
        $tagid=$_GET["tagid"];
        $tagname=$_GET["tagname"];
        $res=mysqli_query($connection,"UPDATE `papertag` SET `tagName`='{$tagname}' WHERE tagId='{$tagid}'");
        echo $res;
    }

    else if ($action=="getPapersbyUserId")
    {
        $userName=$_GET["userId"];
        $sql="select * from papertag where tagId like '%$userName' OR paperId like '%$userName%' OR tagName LIKE '%$userName%'";
//        "select * from papertag where tagId='{$userName}' OR paperId='{$userName}' OR tagName='{$userName}' "
        $res=mysqli_query($connection,$sql);
        $arr=mysqli_fetch_all($res);
        $array=json_encode($arr);
        echo $array;
    }
}
else if ($method=="POST")
{
    $action=$_POST["action"];

    if ($action=="addnewtags")
    {
        $paperid=$_POST["paperid"];
        $tags=$_POST["tags"];
        $tagarr=explode(",",$tags);
        for( $i = 0; $i<count($tagarr); $i++)
        {
            $key=$tagarr[$i];
            $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperid}', '{$key}')");
        }
        echo $up2;
    }
}

