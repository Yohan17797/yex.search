<?php
$emailx=$_POST["email"];
$email=strtolower($emailx);
$password=$_POST["password"];
//var_dump($_POST);

$connection = mysqli_connect("127.0.0.1","root","","yex","3306");
if (!$connection)
{
    die();
}



$result=mysqli_query($connection,"select * from users where email='$email'");
$res=mysqli_fetch_assoc($result);
//var_dump($res);
if ($res['email']=="" OR $res['password']=="")
{
    $match=0;
    header("Location: index.php");
    echo "not match";
}
else if ($res['email']==$email && $res['password']==$password)
{
    session_start();
    $_SESSION["email"]=$email;

    $_SESSION["name"]=$res["name"];
    $_SESSION["userName"]=$res["userName"];
    header("Location: profile.php");
    var_dump($email);
}

else
{
    header("Location: index.php");
    echo "not match";

}