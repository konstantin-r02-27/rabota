<?php
$adres="../../sating/Users/".$_GET['login'].".json";
$file = file_get_contents($adres);
$userData = json_decode($file, TRUE);
if ($_GET['role']!="")
{
    $userData["role"]=$_GET['role'];
    $jsonData = json_encode($userData);
     $file = fopen($adres, 'c');
     $write = fwrite($file,$jsonData);
     fclose($file);
};
if ($_GET['usersname']!="")
{
    $userData["usersname"]=$_GET['usersname'];
    $jsonData = json_encode($userData);
    $file = fopen($adres, 'w');
    $write = fwrite($file,$jsonData);
    fclose($file);
}
include '../users/index.php';
?>
