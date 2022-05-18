<?php
include_once "index_top.php";
?>
<div class="container p-5 my-5 bg-dark text-white">
<h3>Celkový počet objednávok: 
<?php
$sql = "SELECT COUNT(cislo_objednavky) AS total FROM orders";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['total'];
?>
</h3>
</div>

<div class="container p-5 my-5 bg-dark text-white">
<h3>Počet objednávok podľa roku:</h3>
<table class="table table-dark">
<thead>
	<tr>
    <th>Rok</th>
    <th>Objednávky</th>
</tr>
<body>
<?php
$sql = "SELECT YEAR(datum) AS rok, COUNT(cislo_objednavky) AS total FROM orders GROUP BY YEAR(datum)";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	echo '<tr>
              <td>' . $row['rok'] . '</td>
              <td>' . $row['total'] . '</td>
              </tr>';
    }
}
?>
</body>
</table>
</div>



<div class="container p-5 my-5 bg-dark text-white">
<h3>Celkový počet užívateľov:
<?php
$sql = "SELECT COUNT(cislo_zakaznika) AS total FROM zakaznik";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo $row['total'];
?>
</h3>
</div>

<?php
include_once "index_bottom.php";