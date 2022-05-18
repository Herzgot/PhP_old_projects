<?php
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';

$meno = checkDBInput($_POST['meno']);
$priezvisko = checkDBInput($_POST['priezvisko']);
$id = intval($_POST['id']);

if($meno && $priezvisko)
{
   if($id){
        $sql = "UPDATE autor
        SET
        Meno_autora = '$meno',
        Priezvisko_autora = '$priezvisko'
        WHERE Cislo_autora = '$id'";
        if (mysqli_query($conn, $sql)) {
            $show = 4;
        } else {
            $show = 5;
        }
    }
    else{
        $sql = "INSERT INTO autor
        VALUES (NULL, '$meno', '$priezvisko')";
        if (mysqli_query($conn, $sql)) {
            $show = 1;
        } else {
            $show = 2;
        }
    }
}
else   
    $show = 3;

header("location: authors.php?a=$show");