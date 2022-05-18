<?php
include_once "index_top.php";
// Kontrola, ci je uzivatel admin
if(!isAdmin())
{
	echo showBox('Nemáte dostatočné práva', 'danger');
	include_once "index_bottom.php";
	exit;
}
?>

<h1>Objednávky</h1>

<h3>Zoznam objednávok</h3>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Dátum</th>
		<th>Zákazník</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM orders JOIN zakaznik ON zakaznik = cislo_zakaznika";
$result = mysqli_query($conn, $sql);
//var_dump($result);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>';
		echo '<td>' . $row['cislo_objednavky'] . '</td>';
		echo '<td>' . $row['datum'] . '</td>';
		echo '<td>' . $row['meno'] . ' ' . $row['priezvisko'] . '</td>';
		echo '<td align= "right"><a href="my_order.php?objednavka=' . $row['cislo_objednavky'] . '" class="btn btn-warning btn-sm">Detail</a></td>';	
		echo '</tr>';
	}
}
?>
</tbody>
</table>

<?php
include_once "index_bottom.php";