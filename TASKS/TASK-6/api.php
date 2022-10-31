<?php

$db = "flutter";
$dbuser = "root";
$dbpassword = "";
$dbhost = "localhost";

$return["error"] = false;
$return["message"] = "";

$connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $db);

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users SET name = '$name', email = '$email', password='$password'";
    $result = mysqli_query($connect,$sql);
    if($result)
    {
        $return["message"] = "INSERTED";
    }
    else
    {
        $return["error"] = true;
        $return["message"] = "ERROR";
    }
}

mysqli_close($connect);
header('Content-Type: application/json');
echo json_encode($return);