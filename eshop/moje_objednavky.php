<?php
include_once "index_top.php";
?>

<h1>Moje objednávky</h1>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Dátum</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php
$id = $_SESSION['cislo_zakaznika'];
$sql = "SELECT * FROM orders WHERE zakaznik = $id";
$result = mysqli_query($conn, $sql);
//var_dump($result);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>';
		echo '<td>' . $row['cislo_objednavky'] . '</td>';
		echo '<td>' . $row['datum'] . '</td>';
		echo '<td align= "right"><a href="my_order.php?objednavka=' . $row['cislo_objednavky'] . '" class="btn btn-warning btn-sm">Detail</a></td>';	
		echo '</tr>';
	}
}
?>
</tbody>
</table>

<?php
include_once "index_bottom.php";