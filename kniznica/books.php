<?php
include_once "index_top.php";
?>

<h1>Knihy</h1>

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
	$sql = "DELETE FROM kniha WHERE Cislo_zaznamu=$drow";

	if (mysqli_query($conn, $sql)) {
		echo showBox('Údaj bol odstránený','warning');
	} else {
		echo showBox('Chyba pri odstraňovaní','danger');
	}
}

// edit
$nazov='';
$popis='';
$zaner=''; 
$autor='';
$r = 0;
if(isset($_GET['r']))
{
	$r = intval($_GET['r']);
	$sql = "SELECT * FROM kniha WHERE Cislo_zaznamu = '$r' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$nazov = $row['Nazov_knihy'];
		$popis = $row['Popis_knihy'];
		$zaner = $row['Zaner'];
		$autor = $row['Autor'];
		
	}

}
?>

<form action="books_save.php" method="post" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $r; ?>">
	<div class="form-group">
		<label for="nazov" class="col-sm-2 control-label">Názov knihy</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="nazov" name="nazov" value="<?php echo $nazov;?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="popis" class="col-sm-2 control-label">Popis knihy</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="8" id="popis" name="popis" required><?php echo $popis;?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="zaner" class="col-sm-2 control-label">Žáner</label>
		<div class="col-sm-6">
			<select class="form-control" id="zaner" name="zaner" required>
<?php
$sql = "SELECT * FROM zaner_knihy ORDER BY Nazov_zanru";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    echo '<tr>';
	;
	if($zaner == $row['Nazov_zanru'])
		echo '<option value="'.$row['Nazov_zanru'].'" selected>';
	else
		echo '<option value="'.$row['Nazov_zanru'].'">';
	echo $row['Nazov_zanru'].'</option>'. PHP_EOL;
	}
}
?>
			</select>
		</div>
	</div>	
	<div class="form-group">
		<label for="autor" class="col-sm-2 control-label">Autor</label>
		<div class="col-sm-6">
			<select class="form-control" id="autor" name="autor" required>
				<option value="">-----</option>
<?php
$sql = "SELECT * FROM autor ORDER BY Priezvisko_autora";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    echo '<tr>';
	;
	if($autor == $row['Cislo_autora'])
		echo '<option value="'.$row['Cislo_autora'].'" selected>';
	else
		echo '<option value="'.$row['Cislo_autora'].'">';
	echo $row['Priezvisko_autora'].' '.$row['Meno_autora'].'</option>'. PHP_EOL;
	}
}
?>
			</select>
		</div>
	</div>	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Uložiť</button>
		</div>
	</div>
</form>
<hr>

<h3>Zoznam kníh</h3>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Názov knihy</th>
		<th>Opis knihy</th>
		<th>Žáner</th>
		<th>Autor</th>
		<th data-orderable="false" class="text-nowrap text-right">
			<a href="books.php" class="btn btn-success btn-sm">Nová</a>
			<a href="books_pdf.php" class="btn btn-info btn-sm">PDF</a>
			<a href="books_excel.php" class="btn btn-info btn-sm">XLSX</a>
		</th>
	</tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM kniha LEFT JOIN autor ON Autor = autor.Cislo_autora ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    echo '<tr>';
	echo '<td>K'.$row['Cislo_zaznamu'].'</td>';
	echo '<td>'.$row['Nazov_knihy'].'</td>';
	echo '<td>'.$row['Popis_knihy'].'</td>';
	echo '<td>'.$row['Zaner'].'</td>';
	echo '<td>'.$row['Meno_autora'].' '.$row['Priezvisko_autora'].'</td>';
    echo '<td class = "text-right">
	<a href="?r='.$row['Cislo_zaznamu'].'" class="btn btn-warning btn-sm">Edit</a>
	<a href="?drow='.$row['Cislo_zaznamu'].'" class="btn btn-danger btn-sm">Delete</a>
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