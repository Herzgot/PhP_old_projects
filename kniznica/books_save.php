<?php
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';

$nazov = checkDBInput($_POST['nazov']);
$popis = checkDBInput($_POST['popis']);
$zaner = checkDBInput($_POST['zaner']);
$autor = intval($_POST['autor']);
$id = intval($_POST['id']);

if($nazov && $popis && $zaner && $autor)
{
   if($id){
        $sql = "UPDATE kniha
        SET
        Nazov_knihy = '$nazov',
        Popis_knihy = '$popis',
        Zaner = '$zaner',
        Autor = '$autor'
        WHERE Cislo_zaznamu = '$id'";
        if (mysqli_query($conn, $sql)) {
            $show = 4;
        } else {
            $show = 5;
        }
    }
    else{
        $sql = "INSERT INTO kniha
        VALUES (NULL, '$nazov', '$popis','$zaner','$autor')";
        if (mysqli_query($conn, $sql)) {
            $show = 1;
        } else {
            $show = 2;
        }
    }
}
else   
    $show = 3;


header("location: books.php");