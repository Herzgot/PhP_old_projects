<?php
include_once "index_top.php";
?>

<h1>Odhlasenie zo systému</h1>

<?php
unset($_SESSION['Cislo_citatela']);
header('location: index.php');

include_once "index_bottom.php";