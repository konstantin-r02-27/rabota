<?php
session_start();
$_SESSION['error_reg']=0;
$password=$_POST['new_password'];
$password=password_hash($password,PASSWORD_BCRYPT);
$adres=strtolower($_POST['new_login']);
$adres="../sating/Users/".$adres.".json";
if (file_exists($adres))
    $_SESSION['error_reg']=1;
else
    {if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL))
        $_SESSION['error_reg']=2;
    else{
        $userData = [
            "role" => 1,
            "usersname" => $_POST['new_usersname'],
            "login" => $_POST['new_login'],
            "password" => $password,
            "email" => $_POST['new_email'],
            "data" =>  date("d.m.y")];
        $jsonData = json_encode($userData);
        $file = fopen($adres, 'w');
        $write = fwrite($file,$jsonData);
        fclose($file);
        include '../avtorizacia/index.php';
    }}
?>