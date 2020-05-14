<?php
session_start();
//print_r($_POST);
//print_r($_SESSION);
$adres = $_SESSION['adres_users'];
$file = file_get_contents($adres);
$userData = json_decode($file, TRUE);
if (empty($_POST['role']))
{
    $userData["role"]=$_POST['role'];
    $jsonData = json_encode($userData);
    $file = fopen($adres, 'w');
    $write = fwrite($file,$jsonData);
    fclose($file);
};
    print_r($userData);
if (empty($_POST['usersname']))
/*{
    $userData = [
        "usersname" => $_POST['new_usersname']];
    $jsonData = json_encode($userData);
    $file = fopen($adres, 'w');
    $write = fwrite($file,$jsonData);
    fclose($file);
}*/
print_r($userData);
?>
