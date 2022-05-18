<?php
//var_dump($_POST);


$row = isset($_GET['row']) ? intval($_GET['row']) : false;

$data = file('data/database.txt');
//var_dump($_data);

//$text = "$login***$heslo***$email***$pohlavie***$konicky1***$konicky2***$stat***$farba***$opis" . PHP_EOL;
$data[$row - 1 ] =' ';
//var_dump($data);


file_put_contents('data/database.txt', $data); 

header('location:form.php');?>