<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Formuláre (Forms)</h1>

<div class="row">
	<div class="col-sm-6">
<?php
//print_r($GET);
if(isset($_GET['row']) && intval($_GET['row']))
{
	$data = file('data/database.txt');
	$editRow = $data[intval($_GET['row']) - 1];
	$editCell = explode('***',$editRow); 
	//print_r($editCell);
	$action = 'form_update.php';
	$row = intval($_GET['row']);
}
else
{
	$editCell = array_fill(0, 9,'');
	$action = 'form_save.php';
	$row = 0;
}
?>
<!-- zaciatok formulara -->
<form action="<?php echo $action;?>" method="post">
<input type="hidden" name="row" value="<?php echo $row; ?>">
<div class="row mb-3">
	<div class="col-6">
		<label class="form-label" for="login">Login</label>
		<input type="text" class="form-control" id="login" 
		name="login" value="<?php echo $editCell[0]; ?>" required>
	</div>
	<div class="col-6">
		<label class="form-label" for="heslo">Heslo</label>
		<input type="password" class="form-control" id="heslo" name="heslo">
	</div>
</div>

<div class="mb-3">
	<label class="form-label" for="email">Emailová adresa</label>
	<input type="email" class="form-control" id="email" name="email" 
	value="<?php echo $editCell[0]; ?>" required>
</div>

<div class="row mb-3">
	<div class="col-6">
		<label class="form-label" for="email">Pohlavie</label>
		<div class="form-check">
			<input class="form-check-input" type="radio" value="Muž" id="pohlavie1" 
			name="pohlavie"<?php if($editCell[3] == 'Muž') echo 'checked'; ?>>
			<label class="form-check-label" for="pohlavie1">Muž</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" value="Žena" id="pohlavie2" name="pohlavie" 
			<?php if($editCell[3] == 'Žena') echo 'checked'; ?>>
			<label class="form-check-label" for="pohlavie2">Žena</label>
		</div>
	</div>
	<div class="col-6">
		<label class="form-label" for="email">Koníčky</label>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="Hudba" id="konicky1" name="konicky1"
			<?php if($editCell[4] == 'Hudba') echo 'checked'; ?>>
			<label class="form-check-label" for="konicky1">Hudba</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="Šport" id="konicky2" 
			name="konicky2" <?php if($editCell[5] == 'Šport') echo 'checked'; ?>>
			<label class="form-check-label" for="konicky2">Šport</label>
		</div>
	</div>
</div>

<div class="row mb-3">
	<div class="col-6">
		<label class="form-label" for="stat">Štát</label>
		<select class="form-select" id="stat" name="stat">
<?php
$countries = file('data/country.txt');
foreach($countries as $country)
{
	$country = trim($country);
	if($editCell[6] == trim($country))
		echo "<option value='$country' selected> $country</option>";
	else
		echo "<option value='$country'>$country</option>";
}
?>
<?php
//
$moto = array("motorka (cena 20 Euro)","osobné auto (cena 40 Euro)","nákladné auto (cena 100 Euro)");
foreach($moto as $motos)
{
	if($kategoria_vozidla == $motos)
		echo "<option value='$motos' selected> $motos</option>";
	else
		echo "<option value='$motos'>$motos</option>";
}
?>

		</select>
	</div>
	<div class="col-6">
		<label class="form-label" for="farba">Farba</label>
		<input type="color" class="form-control form-control-color" id="farba" name="farba" value="<?php echo $editCell[7];?>">
	</div>
</div>

<div class="mb-3">
	<label class="form-label" for="opis">Opis</label>
	<textarea class="form-control" id="opis" name="opis" rows="6" 
	placeholder="Sem vložte text"><?php echo $editCell[8]; ?></textarea>
</div>

<div class="mb-3">
    <button type="button" class="btn btn-primary" name="button">Nič nerobím</button>
    <button type="submit" class="btn btn-success" name="submit">Odosielam</button>
    <button type="reset" class="btn btn-secondary" name="reset">Resetujem</button>
</div>

</form>
<!-- koniec formulara -->
	</div>	
</div>	

<?php
$data = file('data/database.txt');
echo '<table class="table table-striped">';

echo '<thead>';
echo '<tr>';
echo '<th>login</th><th>heslo</th><th>email</th><th>pohlavie</th><th>konicky1</th><th>stat</th><th>farba</th><th>opis</th>';
echo '<th><a href="form.php" class = "btn-primary btn-sm">Novy</a></th>';
echo '<th></th>';
echo '<tr>';
echo '</thead>';

echo '<tbody>';
foreach($data as $k => $row)
{	
	echo '<tr>';
	$cells = explode('***', $row);
	foreach($cells as $cell)
    	echo '<td>' . $cell . '</td>'; 
	echo '<td><a href="form.php?row=' . ($k + 1) . '" class = "btn-primary btn-sm">Upravit</a></td>';
	echo '<td><a href="form_delete.php?row='.($k + 1) .'"class =  "btn-danger btn-sm" >Vymazat</a></td>';
	//echo '<td><a class = "btn-primary btn-sm" href='./edit.php?id=". ($k + 1) ."'>edit</a></td>';
    //echo '<td><a class = "btn-danger btn-sm" href='./delete.php?id=". ($k + 1) ."'>delete</a></td>';
	/*echo '</tr>';
		echo "<td>
			<div class='btn-group'>
				<a class = 'btn btn-secundary'href='./edit.php?id=". ($k + 1) ."'>edit</a></td>';
    			<a class = 'btn btn-danger' href='./delete.php?id=". ($k + 1) ."'>delete</a></td>';
			</div>
		</td>";*/
	echo '</tr>';
    
	// $data[$k]['zlucenina']  === $v['zlucenina']
}
echo '</tbody>';

echo '</table>';

?>


<?php
include "indexFoot.php";
?>
