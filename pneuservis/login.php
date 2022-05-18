<?php
include_once "indexHead.php";
?>

<h1>Prihlásenie do systému</h1>

<form action="index.php" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="login" class="col-sm-2 control-label">Login</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="login" name="login" required>
		</div>
	</div>
	<div class="form-group">
		<label for="heslo" class="col-sm-2 control-label">Heslo</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="heslo" name="heslo" required>
		</div>
	</div>	
    <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-info">Prihlásiť</button>
		</div>
	</div>
</form>


<?php
include_once "indexFoot.php";