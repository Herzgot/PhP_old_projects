<?php
//var_dump($_POST);
print_r($_POST);
$login = isset($_POST['login']) ? trim($_POST['login']) : false;
$heslo = isset($_POST['heslo']) ? md5(trim($_POST['heslo'])) : false;
$email = isset($_POST['email']) ? trim($_POST['email']) : false;
$pohlavie = isset($_POST['pohlavie']) ? trim($_POST['pohlavie']) : false;
$konicky1 = isset($_POST['konicky1']) ? trim($_POST['konicky1']) : false;
$konicky2 = isset($_POST['konicky1']) ? trim($_POST['konicky1']) : false;
$stat = isset($_POST['stat']) ? trim($_POST['stat']) : false;
$farba = isset($_POST['farba']) ? trim($_POST['farba']) : false;
$opis = isset($_POST['opis']) ? trim($_POST['opis']) : false;

$row = isset($_POST['row']) ? intval($_POST['row']) : false;

$data = file('data/database.txt');
//var_dump($_data);

$text = "$login***$heslo***$email***$pohlavie***$konicky1***$konicky2***$stat***$farba***$opis" . PHP_EOL;
$data[$row - 1 ] =$text;
//var_dump($data);


file_put_contents('data/database.txt', $data); 

header('location:form.php');?>