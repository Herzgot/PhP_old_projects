<?php
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';
include_once "index_top.php";

// Kontrola, ci je uzivatel admin
if(!isAdmin())
{
	echo 'Nemáte dostatočné práva';
	exit;
}

$nazov = checkDBInput($_POST['nazov']);
$popis = checkDBInput($_POST['popis']);
$kategoria = checkDBInput($_POST['kategoria']);
$cena = intval($_POST['cena']);
$id = intval($_POST['id']);

if($nazov && $popis && $kategoria && $cena)
{
	// ak $id > 0 ==> uprava
	// ak $id = 0 ==> vkladanie	
	if($id)
	{
		// Uprava zaznamu 
		$sql = "UPDATE tovar SET 
			nazov = '$nazov', 
			opis = '$popis',
			kategoria = '$kategoria',
			cena = '$cena'
			WHERE cislo_tovaru = '$id'";
		if (mysqli_query($conn, $sql)) 
			$show = 4;
		else
			$show = 5;			
	}
	else
	{
		// Vkladanie noveho zaznamu
		$sql = "INSERT INTO tovar VALUES (NULL, '$nazov', '$popis', '$kategoria', '$cena')";
		if (mysqli_query($conn, $sql)) 
			$show = 1;
		else
			$show = 2;
	}
}
else
	$show = 3;
header("location: tovar.php?a=$show");