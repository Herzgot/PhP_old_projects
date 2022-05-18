<?php
include_once "index_top.php";
?>


<h1>Zoznam tovaru</h1>

<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Názov tovaru</th>
		<th>Opis</th>
		<th>Kategória</th>
		<th>Cena</th>
	</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
//var_dump($result);

if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>';
		echo '<td>' . $row['cislo_tovaru'] . '</td>';
		echo '<td>' . $row['nazov'] . '</td>';
		echo '<td>' . $row['opis'] . '</td>';
		echo '<td>' . $row['kategoria'] . '</td>';
    	echo '<td>' . $row['cena'] . '€</td>';	
		echo '</tr>';
	}
}
?>
</tbody>
</table>


<?php
include_once "index_bottom.php";