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

<h1>Zákazníci</h1>

<h4>Zoznam zákazníkov</h4>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>Priezvisko</th>
		<th>Login</th>
		<th>Heslo</th>
		<th>Rola</th>
	</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM zakaznik ORDER BY login";
$result = mysqli_query($conn, $sql);
//var_dump($result);

if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>';
		echo '<td>' . $row['priezvisko'] . '</td>';
		echo '<td>' . $row['login'] . '</td>';
		echo '<td>*****</td>';
		echo '<td>' . $row['rola'] . '</td>';
		echo '</tr>';
  	}
}
?>
</tbody>
</table>

<?php
include_once "index_bottom.php";