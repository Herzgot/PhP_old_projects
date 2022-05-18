<?php
include_once "index_top.php";
?>

<h1>Objednávkový formulár</h1>

<?php 

if(isset($_GET['a']))
{
	if($_GET['a'] == 1){
		echo showBox('Objednávka bola odoslaná', 'success');
		echo showBox('Bol Vám odoslaný email s detailom objednávky', 'info');
	}
	elseif($_GET['a'] == 2)
		echo showBox('Objednávka nebola odoslaná', 'danger');
	elseif($_GET['a'] == 3)
		echo showBox('Vyberte prosím tovar a počet kusov', 'warning');
}

for($i = 1; $i <= 5; $i++){
echo '<form action="order.php" method="post">
	<div class="row">
		<div class="col-sm-6">
			<label for="polozka' . $i . '" class="col-sm-2 control-label">Položka&nbsp' . $i . '</label>
				<select class="form-control" id="polozka' . $i . '" name="polozka' . $i . '">
					<option value="">-----</option>';

$polozka[$i] ='';
$pocet[$i]='';
$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['cislo_tovaru'] == $polozka1)
			echo '<option value="' . $row['cislo_tovaru'] . '" selected>';
		else
			echo '<option value="' . $row['cislo_tovaru'] . '">';
		echo $row['nazov'];
		echo '</option>' . PHP_EOL;
  	}
}		
echo			'</select>
	</div>
	<div class="col-sm-1">
	<label control-label">Počet</label>
			<input type="number" min="0" class="form-control" id="pocet' . $i . '" name="pocet' . $i . '" 
			value="<?php echo $pocet' . $i . '; ?>">
	</div>
	</div>';
}
?>
	<div class="form-group">
		<br>
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary">Objednať</button>
			<button type="reset" class="btn btn-danger">Reset</button>
		</div>
		<br>
	</div>
</form>

<hr> 

<?php
include_once "index_bottom.php";