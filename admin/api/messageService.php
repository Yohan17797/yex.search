<?php
$connection = mysqli_connect("127.0.0.1", "root", "", "yex", "3306");
if (!$connection) {
    die();
}

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {
    $action = $_POST["action"];
    if ($action == "send") {
        $from = $_POST["from"];
        $paperId=$_POST["paperId"];
        $to = $_POST["to"];
        $msg = $_POST["msg"];
        $date = $_POST["date"];
//        var_dump($msg);

        $sql="INSERT INTO `msg`(`messageTo`, `messageFrom`, `message`, `date`, `paperId`) VALUES ('{$to}','{$from}','{$msg}','{$date}','{$paperId}')";

        $res = mysqli_query($connection, $sql);

        if (!$res)
        {
            echo mysqli_error($connection);
        }
        echo $res;
    }
}

else if($method=="GET"){
    $action = $_GET["action"];
    if ($action=="getMessages")
    {
        var_dump($_GET);
    }

}