<?php
/**
 * Created by IntelliJ IDEA.
 * User: Yohan
 * Date: 9/29/2019
 * Time: 5:03 PM
 */
$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"]=="update")
    {
//        var_dump($_POST);
        $paperId=$_POST["paperId"];
        $paperTitle=$_POST["paperTitle"];
        $paperDes=$_POST["paperDes"];
        $tags=$_POST["tags"];
        $status=$_POST["status"];
        $pageId=$_POST["pageId"];
        if (!$tags =="")
        {
            $tagarr=explode(",",$tags);
            for( $i = 0; $i<count($tagarr); $i++)
            {
                $key=$tagarr[$i];
                $up2 = mysqli_query($connection, "INSERT INTO `papertag`(`paperId`, `tagName`) VALUES ('{$paperId}', '{$key}')");
            }
        }

        $res=mysqli_query($connection,"UPDATE `papers` SET `paperTitle`='{$paperTitle}', `paperDes`='{$paperDes}' WHERE paperId='{$paperId}'");
        $res2=mysqli_query($connection,"UPDATE `pages` SET `status` = '$status' WHERE `pages`.`pageId` = '$pageId'");
        if (!$res2)
        {
            echo mysqli_error($connection);
        }


        echo $res;

    }
}

else if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    if ($_GET["action"]=="delete")
    {
        $paperId=$_GET["paperId"];
        $res=mysqli_query($connection,"DELETE FROM `papers` WHERE paperId='{$paperId}'");
        echo $res;
    }

    else if ($_GET["action"]=="getUpdate")
    {
        $paperId=$_GET["paperId"];
        $res=mysqli_query($connection,"select * FROM `papers` WHERE paperId='{$paperId}'");
//        $res2=mysqli_query($connection,"select * FROM `papertag` WHERE paperId='{$paperId}'");
//        $tags1=mysqli_fetch_all($res2);
//        $tags=json_encode($tags1);

        $result =mysqli_fetch_assoc($res);
        $final=json_encode($result);
        echo $final;
//        echo $tags;
    }

    else if ($_GET["action"]=="getTags")
    {
        $paperId=$_GET["paperId"];
//        $res=mysqli_query($connection,"select * FROM `papers` WHERE paperId='{$paperId}'");
        $res2=mysqli_query($connection,"select * FROM `papertag` WHERE paperId='{$paperId}'");
        $tags1=mysqli_fetch_all($res2);
        $tags=json_encode($tags1);
        echo $tags;
    }
}



