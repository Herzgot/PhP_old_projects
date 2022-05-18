<?php
include_once "index_top.php";
?>

<h1>Autori</h1>

<?php
if(isset($_GET['a']))
{
switch ($_GET['a']){
	case 1:
		echo showBox('Údaj bol uložený','success');
		break;
	case 2:
		echo showBox('Údaj nebol uložený','danger');
		break;
	case 3:
		echo showBox('Údaj nebol uložený/upravený, chýbajú údaje','danger');
		break;
	case 4:
		echo showBox('Údaj bol upravený','success');
		break;
	case 5:
		echo showBox('Údaj nebol upravený','danger');
		break;	
	}
}

//mazanie
if(isset($_GET['drow']))
{
	$drow = intval($_GET['drow']);
	$sql = "DELETE FROM autor WHERE Cislo_autora=$drow";

	if (mysqli_query($conn, $sql)) {
		echo showBox('Údaj bol odstránený','warning');
	} else {
		echo showBox('Chyba pri odstraňovaní','danger');
	}
}

// edit
$meno='';
$priezvisko='';
$r = 0;
if(isset($_GET['r']))
{
	$r = intval($_GET['r']);
	$sql = "SELECT * FROM autor WHERE Cislo_autora = '$r'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$meno = $row['Meno_autora'];
		$priezvisko = $row['Priezvisko_autora'];
	}

}
?>

<form action="authors_save.php" method="post" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $r; ?>">
	<div class="form-group">
		<label for="meno" class="col-sm-2 control-label">Meno</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="meno" name="meno" value="<?php echo $meno; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="priezvisko" class="col-sm-2 control-label">Priezvisko</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="priezvisko" name="priezvisko" value="<?php echo $priezvisko; ?>" required>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Uložiť</button>
		</div>
	</div>
</form>
<hr>

<h3>Zoznam autorov</h3>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Meno</th>
		<th>Priezvisko</th>
		<th data-orderable="false" class="text-nowrap text-right">
			<a href="authors.php" class="btn btn-success btn-sm">Nový</a>
			<a href="authors_pdf.php" class="btn btn-info btn-sm">PDF</a>
			<a href="authors_excel.php" class="btn btn-info btn-sm">XLSX</a>
		</th>
	</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM autor";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    echo '<tr>';
	echo '<td>A'.$row['Cislo_autora'].'</td>';
	echo '<td>'.$row['Meno_autora'].'</td>';
	echo '<td>'.$row['Priezvisko_autora'].'</td>';
    echo '<td class = "text-right">
	<a href="?r='.$row['Cislo_autora'].'" class="btn btn-warning btn-sm">Edit</a>
	<a href="?drow='.$row['Cislo_autora'].'" class="btn btn-danger btn-sm">Delete</a>
	</td>';
    echo '</tr>';
}
} else {
  echo "0 results";
}
// mysqli_close($conn);
?>

</tbody>
</table>

<?php
include_once "index_bottom.php";