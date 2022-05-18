<?php
include_once "indexHead.php";
?>

<h1>Odhlasenie zo systému</h1>

<?php
unset($_SESSION['Cislo_citatela']);
header('location: index.php');

include_once "indexFoot.php";