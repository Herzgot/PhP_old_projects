<?php
include_once 'inc/spojenie.php';
include_once 'inc/funkcie.php';

$spz = checkDBInput($_POST['spz']);
$kategoria_vozidla = checkDBInput($_POST['kategoria_vozidla']);
$pneumatiky = checkDBInput($_POST['pneumatiky']);
$krajina = checkDBInput($_POST['krajina']);
$psc = checkDBInput($_POST['psc']);
$mesto = checkDBInput($_POST['mesto']);
$ulica = checkDBInput($_POST['ulica']);
$telefon = checkDBInput($_POST['telefon']);
$termin = intval($_POST['termin']);
$id = 0;

if($spz && $kategoria_vozidla && $pneumatiky && $krajina && $psc && $mesto && $ulica && $termin)
{
   if($id){
        $sql = "UPDATE servis_udaje
        SET
        spz = '$spz'
        kategoria_vozidla = '$kategoria_vozidla',
        krajina = '$krajina',
        pneumatiky = '$pneumatiky',
        psc = '$psc',
        mesto = '$mesto',
        ulica = '$ulica',
        termin = '$termin'
        WHERE ID = '$id'";
        if (mysqli_query($conn, $sql)) {
            $show = 4;
        } else {
            $show = 5;
        }
    }
    else{
        $sql = "INSERT INTO servis_udaje
        VALUES ( '$kategoria_vozidla','$pneumatiky','$spz', '$krajina','$psc','$mesto','$ulica','$telefon','$termin')";
        if (mysqli_query($conn, $sql)) {
            $show = 1;
        } else {
            $show = 2;
        }
    }
}
else   
    $show = 3;
header("location: index.php");
?>
