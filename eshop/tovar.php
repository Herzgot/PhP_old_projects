<?php
include_once "index_top.php";
?>
<h1>Tovar</h1>

<?php
// Kontrola, ci je uzivatel admin
if(!isAdmin())
{
	echo showBox('Nemáte dostatočné práva', 'danger');
	include_once "index_bottom.php";
	exit;
}

// Zobrazenie spravy o insert/update
if(isset($_GET['a']))
{
	if($_GET['a'] == 1)
		echo showBox('Údaj bol uložený', 'success');
	elseif($_GET['a'] == 2)
		echo showBox('Údaj nebol uložený', 'danger');
	elseif($_GET['a'] == 3)
		echo showBox('Údaj nebol uložený/upravený - chýbaju údaje', 'danger');
	elseif($_GET['a'] == 4)
		echo showBox('Údaj bol upravený', 'success');
	elseif($_GET['a'] == 5)
		echo showBox('Údaj nebol upravený', 'danger');		
}

// Vymazanie zaznamu
if(isset($_GET['del']))
{
	$delete = intval($_GET['del']);
	$sql = "DELETE FROM tovar WHERE cislo_tovaru = '$delete'";

	if (mysqli_query($conn, $sql)) 
		echo showBox('Údaj bol vymazaný');
	else
		echo showBox('Údaj nebol vymazaný', 'danger');
}

// Udaje pre vyplenie formulara
$Cislo_tovaru = '';
$Nazov_tovaru = '';
$Popis_tovaru = '';
$Kategoria = '';
$Cena = '';
if(isset($_GET['edit']))
{
	$edit = intval($_GET['edit']);
	$sql = "SELECT * FROM tovar WHERE cislo_tovaru = '$edit' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$Cislo_tovaru = $row['cislo_tovaru'];
		$Nazov_tovaru = $row['nazov'];
		$Popis_tovaru = $row['opis'];
		$Katgoria = $row['kategoria'];
		$Cena = $row['cena'];
	}	
}
?>

<form action="tovar_save.php" method="post" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $Cislo_tovaru; ?>">
	<div class="form-group">
		<label for="nazov" class="col-sm-2 control-label">Názov tovaru</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="nazov" name="nazov" 
			value="<?php echo $Nazov_tovaru; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="popis" class="col-sm-2 control-label">Opis tovaru</label>
		<div class="col-sm-10">
			<textarea class="form-control" rows="8" id="popis" name="popis" required><?php echo $Popis_tovaru; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="kategoria" class="col-sm-2 control-label">Kategória</label>
		<div class="col-sm-6">
			<select class="form-control" id="kategoria" name="kategoria" required>
				<option value="">-----</option>
<?php
$sql = "SELECT * FROM kategoria ORDER BY nazov_kategorie";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['nazov_kategorie'] == $Kategoria)
			echo '<option value="' . $row['nazov_kategorie'] . '" selected>';
		else
			echo '<option value="' . $row['nazov_kategorie'] . '">';
		echo $row['nazov_kategorie'];
		echo '</option>' . PHP_EOL;
  	}
}				
?>
			</select>
		</div>
	</div>	
	<div class="form-group">
		<label for="cena" class="col-sm-2 control-label">Cena</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" id="cena" name="cena" 
			value="<?php echo $Cena; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Uložiť</button>
		</div>
	</div>
</form>
<hr>

<h3>Zoznam tovaru</h3>
<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Názov tovaru</th>
		<th>Opis</th>
		<th>Kategória</th>
		<th>Cena</th>
		<th></th>
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
    	echo '<td>' . $row['cena'] . '</td>';
		echo '<td class="text-right">';
		echo '<a href="?edit=' . intval($row['cislo_tovaru']) . '" class="btn btn-warning btn-sm">Edit</a> &nbsp; ';	
		echo '<a href="?del=' . intval($row['cislo_tovaru']) . '" class="btn btn-danger btn-sm">Delete</a>';
		echo '</td>';	
		echo '</tr>';
	}
}
?>
</tbody>
</table>


<?php
include_once "index_bottom.php";