<?php
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';


$meno = checkDBInput($_POST['meno']);
$priezvisko = checkDBInput($_POST['priezvisko']);
$email = checkDBInput($_POST['email']);
$telefon = checkDBInput($_POST['telefon']);
$login = checkDBInput($_POST['login']);
$heslo = md5($_POST['heslo']);
$id = intval($_POST['id']);

if($meno && $priezvisko && $email && $login && $heslo)
{
		// Vkladanie noveho zaznamu
		$sql = "INSERT INTO zakaznik VALUES (NULL, '$meno', '$priezvisko', '$email', NULLIF('$telefon',''), '$login', '$heslo', 'user')";
		if (mysqli_query($conn, $sql)) 
			$show = 1;
		else
			$show = 2;
}
else
	$show = 3;
header("location: register.php?a=$show");
