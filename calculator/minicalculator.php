<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Kalkulačka</h1>

<?php
// Spracovanie udajov
$c1 = $_POST['c1'];
$c2 = $_POST['c2'];
$o = $_POST['o'];
$result = '';

if (is_numeric($c1) && is_numeric($c2)) {
    switch ($o) {
        case "+":
           $result = $c1 + $c2;
            break;
        case "-":
           $result = $c1 - $c2;
            break;
        case "*":
            $result = $c1 * $c2;
            break;
        case "/":
            $result = $c1 / $c2;
		case "%";
			$result = ($c1/100) * $c2;
    }
}

?>
<?php
if (isset($_POST['delete']))
{
	$_POST = array ();
}
?>
<form action="" method="post"><!-- ak nie je uvedeny ACTION, udaje spracovava ten isty subor -->
	<div class="row">
		<div class="col-sm-2">
			<div class="form-group">
				<input type="text" class="form-control" name="c1" id="c1" value="<?php echo $c1; ?>" placeholder="zadaj číslo" required>
			</div>
		</div>
		<div class="col-sm-1">
			<div class="form-group">
				<select class="form-control" name="o" id="o" value="<?php echo $result; ?>">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
					<option value="%">%</option>
				</select>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="form-group">
				<input type="text" class="form-control" name="c2" id="c2" value="<?php echo $c2; ?>" placeholder="zadaj číslo" required>
			</div>		
		</div>
		<div class="col-sm-2">
			<button type="submit" class="btn btn-success">=</button>
			<button type="submit" class="btn btn-danger" name="delete">DEL</button>
		</div>
		<div class="col-sm-3">
			<div class="form-control">
			
             <input readonly="text" name="result" value="<?php echo $result; ?>"> 
            </div>
		</div>
	</div>
</form>
<?php if (isset($_POST['delete']))
{
	$_POST = array ();
}

?>

<?php
include "indexFoot.php";
?>