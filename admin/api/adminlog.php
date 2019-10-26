<?php
session_start();
$email=$_POST["email"];
$pass=$_POST["password"];
if ($email=="yrenterprices@gmail.com" && $pass=="itsme")
{
    $_SESSION["admin"]="adminlog";
    header("Location: \webApp/admin/index.php");

}
else{
    header("Location: \webApp/admin/adminsignin.php");
}