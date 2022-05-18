<?php
include "indexHead.php";
?>

<?php
var_dump($_POST);
$den = isset($_POST['den']) ? intval($_POST['den']) : 0;
$mesiac = isset($_POST['mesiac']) ? intval($_POST['mesiac']) : 0;
$rok = isset($_POST['rok']) ? intval($_POST['rok']) : 0;
if($den && $mesiac && $rok)
{
	$datum = "$den.$mesiac.$rok";
}
else 
	$datum  = date('d.m.Y');


?>

<h1 class="mt-5 mb-4">Kurzový lístok</h1>

<form action="" method="post" class="row gy-2 gx-3 align-items-center">
	<div class="col-auto">
		<label class="visually-hidden" for="den">Deň</label>
		<input type="number" min="1" max="31" id="den" value="" name="den" class="form-control" required placeholder="Deň">
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="mesiac">Mesiac</label>
		<input type="number" min="1" max="12" id="mesiac" value="" name="mesiac" class="form-control" required placeholder="Mesiac">
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="rok">Rok</label>	
		<input type="number" min="2000" max="" value="" name="rok" class="form-control" required placeholder="Rok">
	</div>
	<div class="col-auto">	
		<button type="submit" class="btn btn-primary" name="zobraz">Zobraz</button>
	</div>
	<div class="col-auto">	
		<a href="?today=1" class="btn btn-success" name="zobraz">Dnešný</a>
	</div>	
</form>
<?php

/*$den = isset($_POST['den']) ? intval($_POST['den']) : 0;
$mesiac = isset($_POST['mesiac']) ? intval($_POST['mesiac']) : 0;
$rok = isset($_POST['rok']) ? intval($_POST['rok']) : 0;
if($den && $mesiac && $rok)
{
	$datum = "$den.$mesiac.$rok";
}
else 
	$datum  = date('d.m.Y');
*/	
$url = 'http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt?date=DD.MM.RRRR' . $datum;
$csv = file($url);

?>
<?php


//var_dump($data);

echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
	echo "<th></th>";
    $bunkyH = explode("|",$csv[1]);
    foreach($bunkyH as $bunka)
    {
        echo "<th>$bunka</th>";
    }
    echo '</tr>';
    echo '</thead>';
	
    echo '<tbody>';
    for($i =2; $i < count($csv); $i++)
    {
        echo '<tr>';
        $bunkyD = explode("|",$csv[$i]);

		$flag = 'flags/' . strtolower($bunkyD[3]) . '.png';
		if (file_exists($flag))
			echo "<td><img src='$flag'></td>";
		else
			echo  "<td></td>";
            
		foreach($bunkyD as $bunka)
        {
            echo "<td>$bunka</td>";
        }
		$kurz = trim(str_replace(',', '.',$bunkyD[4]));
		$kurz = number_format(1.1 * $kurz, 3,',',''); //*1.1
		echo "<td>$kurz</td>";
    	echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
?>

<?php
include "indexFoot.php";
?>