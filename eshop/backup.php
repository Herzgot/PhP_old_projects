<form action="/action_page.php">
<div class="mb-3 mt-3">
    <label for="email" class="form-label">Názov</label>
    <input type="email" class="form-control" id="email" placeholder="Zadajte názov" name="nazov">
  </div>
  <div class="mb-3 mt-3">
  <label for="email" class="form-label">Kategória</label>
  	<select class="form-select">
  <option>Elektro</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
	</select>
  </div>
  <div class="mb-3">
  <label for="comment">Opis</label>
<textarea class="form-control" rows="5" id="comment" name="text"></textarea>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Cena</label>
    <input type="email" class="form-control" id="email" placeholder="Zadajte cenu" name="cena">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<h1>Tovar</h1>

<table class="table table-striped tablejs">
<thead>
	<tr>
		<th>ID</th>
		<th>Položka</th>
		<th>Opis tovaru</th>
		<th>Počet kusov</th>
	</tr>
</thead>
<tbody>

</tbody>
</table>




<div class="row">
	<div class="col-sm-6">
		<label for="polozka2" class="col-sm-2 control-label">Položka 2</label>
			<select class="form-control" id="polozka2" name="polozka2">
				<option value="">-----</option>
<?php
$polozka2 ='';
$pocet2='1';

$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['cislo_tovaru'] == $polozka2)
			echo '<option value="' . $row['cislo_tovaru'] . '" selected>';
		else
			echo '<option value="' . $row['cislo_tovaru'] . '">';
		echo $row['nazov'];
		echo '</option>' . PHP_EOL;
  	}
}		
?>
			</select>
	</div>
	<div class="form-group col-sm-2">
	<label class="col-sm-2 control-label">Počet</label>
		<div class="col-sm-6">
			<input type="number" min="1" class="form-control" id="pocet2" name="pocet2" 
			value="<?php echo $pocet2; ?>" required>
		</div>
	</div>

<div class="row">
	<div class="col-sm-6">
		<label for="polozka3" class="col-sm-2 control-label">Položka 3</label>
			<select class="form-control" id="polozka3" name="polozka3" >
				<option value="">-----</option>
<?php
$polozka3 ='';
$pocet3='1';
$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['cislo_tovaru'] == $polozka3)
			echo '<option value="' . $row['cislo_tovaru'] . '" selected>';
		else
			echo '<option value="' . $row['cislo_tovaru'] . '">';
		echo $row['nazov'];
		echo '</option>' . PHP_EOL;
  	}
}		
?>
			</select>
	</div>
	<div class="form-group col-sm-2">
	<label class="col-sm-2 control-label">Počet</label>
		<div class="col-sm-6">
			<input type="number" min="1" class="form-control" id="pocet3" name="pocet3" 
			value="<?php echo $pocet3; ?>" required>
		</div>
	</div>

<div class="row">
	<div class="col-sm-6">
		<label for="polozka4" class="col-sm-2 control-label">Položka 4</label>
			<select class="form-control" id="polozka4" name="polozka4" >
				<option value="">-----</option>
<?php
$polozka4 ='';
$pocet4='1';
$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['cislo_tovaru'] == $polozka4)
			echo '<option value="' . $row['cislo_tovaru'] . '" selected>';
		else
			echo '<option value="' . $row['cislo_tovaru'] . '">';
		echo $row['nazov'];
		echo '</option>' . PHP_EOL;
  	}
}		
?>
			</select>
	</div>
	<div class="form-group col-sm-2">
	<label class="col-sm-2 control-label">Počet</label>
		<div class="col-sm-6">
			<input type="number" min="1" class="form-control" id="pocet4" name="pocet4" 
			value="<?php echo $pocet4; ?>" required>
		</div>
	</div>

<div class="row">
	<div class="col-sm-6">
		<label for="polozka5" class="col-sm-2 control-label">Položka 5</label>
			<select class="form-control" id="polozka5" name="polozka5" >
				<option value="">-----</option>
<?php
$polozka5 ='';
$pocet5='1';
$sql = "SELECT * FROM tovar";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	if($row['cislo_tovaru'] == $polozka5)
			echo '<option value="' . $row['cislo_tovaru'] . '" selected>';
		else
			echo '<option value="' . $row['cislo_tovaru'] . '">';
		echo $row['nazov'];
		echo '</option>' . PHP_EOL;
  	}
}		
?>
			</select>
	</div>
	<div class="form-group col-sm-2">
	<label class="col-sm-2 control-label">Počet</label>
		<div class="col-sm-6">
			<input type="number" min="1" class="form-control" id="pocet5" name="pocet5" 
			value="<?php echo $pocet5; ?>" required>
		</div>
	</div>



