<?php
include_once "index_top.php";
?>

<h1>Odhlásenie zo systému</h1>

<?php
unset($_SESSION['cislo_zakaznika']);
header('location: index.php');

include_once "index_bottom.php";