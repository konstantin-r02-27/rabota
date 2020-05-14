<?php
session_start();
$_SESSION['error']=0;
$login=strtolower($_POST['login']);
$adres="../sating/Users/".$login.".json";
if (file_exists($adres))
{
	$file = file_get_contents($adres);
	$userData = json_decode($file, TRUE);
	$userlogin = strtolower($userData['login']);
	if (($login == $userlogin) && password_verify($_POST['password'], $userData['password']))//верный пароль
	{
		$_SESSION['role'] = $userData["role"];
		$_SESSION['usersname'] = $userData['usersname'];
		$_SESSION['flag'] = 1;
		include '../home/index.php';
	}
	else
	{
		$_SESSION['error']=1;
		include '../avtorizacia/index.php';
	}
}
else {
	$_SESSION['error']=2;
	include '../avtorizacia/index.php';
}
?>

