<?php
include_once "index_top.php";
?>


<h1>Detail objednávky</h1>
<?php
if(isset($_GET['objednavka']))
{
	$objednavka = $_GET['objednavka'];
		
}
?>

<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>Tovar</th>
		<th>Počet kusov</th>
		<th>Cena za kus</th>
        <th align= "right"><a href="my_order_pdf?objednavka=<?php echo $objednavka ?>" class="btn btn-success btn-sm">PDF</a></th>
	</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM order_list JOIN tovar ON polozka = cislo_tovaru WHERE order_list.order = $objednavka ";
$result = mysqli_query($conn, $sql);
//var_dump($result);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>';
		echo '<td>' . $row['nazov'] . '</td>';
		echo '<td>' . $row['pocet'] . '</td>';
		echo '<td>' . $row['cena'] . '€</td>';
        echo '<td></td>';
		echo '</tr>';
	}
}
?>
</tbody>
</table>
<?php
include_once "index_bottom.php";