<?php
include_once "index_top.php";
?>

<h1>Registrácia</h1>
<?php

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

$cislo_zakaznika = '';
$meno = '';
$priezvisko = '';
$email = '';
$telefon = '';
$login = '';
$heslo = '';
if(isset($_GET['edit']))
{
	$edit = intval($_GET['edit']);
	$sql = "SELECT * FROM zakaznik WHERE cislo_zakaznika = '$edit' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) 
	{
		$row = mysqli_fetch_assoc($result);
		$cislo_zakaznika = $row['cislo_zakaznika'];
		$meno = $row['nazov'];
		$priezvisko = $row['opis'];
		$email = $row['email'];
    $telefon = $row['telefon'];
		$login = $row['login'];
    $heslo = $row['heslo'];
	}	
}
?>

<form action="register_save.php" method="post" class="form-horizontal">
	<input type="hidden" name="id" value="<?php echo $cislo_zakaznika; ?>">
	<div class="form-group">
		<label for="meno" class="col-sm-2 control-label">Meno</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="meno" name="meno" 
			value="<?php echo $meno; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="priezvisko" class="col-sm-2 control-label">Priezvisko</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="priezvisko" name="priezvisko" 
			value="<?php echo $priezvisko; ?>" required>
		</div>
	</div>
  <div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" 
			value="<?php echo $email; ?>" required>
		</div>
	</div>
  <div class="form-group">
		<label for="telefon" class="col-sm-2 control-label">Telefón (Nepovinný údaj)</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" id="telefon" name="telefon" 
			value="<?php echo $telefon; ?>">
		</div>
	</div>
  <div class="form-group">
		<label for="login" class="col-sm-2 control-label">Login</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="login" name="login" 
			value="<?php echo $login; ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label for="heslo" class="col-sm-2 control-label">Heslo</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="heslo" name="heslo" 
			value="<?php echo $heslo; ?>" required>
		</div>
	</div>
	<br>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Registrovať</button>
		</div>
	</div>
</form>

<?php
include_once "index_bottom.php";