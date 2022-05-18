<?php
include "indexHead.php";
?>
<?php
$den = isset($_POST['den']) ? intval($_POST['den']) : 0;
$mesiac = isset($_POST['mesiac']) ? intval($_POST['mesiac']) : 0;
$rok = isset($_POST['rok']) ? intval($_POST['rok']) : 0;
if($den && $mesiac && $rok)
{
	$datum = "$den.$mesiac.$rok";
}
else 
	$datum  = date('d.m.Y');
	
$url = 'http://www.cnb.cz/cs/financni_trhy/devizovy_trh/kurzy_devizoveho_trhu/denni_kurz.txt?date=DD.MM.RRRR' . $datum;
$csv = file($url);
?>
<h1 class="mt-5 mb-4">Kalkulátor</h1>

<form action="" method="post" class="row gy-2 gx-3 align-items-center">
	<div class="col-auto">
		<label class="visually-hidden" for="den">Deň</label>
		<input type="number" class="form-control mb-2 mr-sm-2" min="1" max="31" name="den" value="" required placeholder="Deň">
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="mesiac">Mesiac</label>
		<input type="number" class="form-control mb-2 mr-sm-2" min="1" max="12" name="mesiac" value="" required placeholder="Mesiac">
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="rok">Rok</label>
		<input type="number" class="form-control mb-2 mr-sm-2" min="2000" max="" value="" name="rok" required placeholder="Rok">
	</div>	

<?php
    for($i =2; $i <count($csv);$i++)
    {
    
    $data = explode('|',$csv[$i]);
    $country[] = $data[0];
    }
?>
<?php
    for($i =2; $i <count($csv);$i++)
    {
    
    $data = explode('|',$csv[$i]);
    }
?>
	<div class="col-auto">
		<label class="visually-hidden" for="hodnota">Hodnota</label>
		<input type="text" class="form-control mb-2 mr-sm-2" name="hodnota" placeholder="hodnota" required>
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="zMeny">Prevod z meny</label>		
		<select id="zMeny" name="zMeny" class="form-control mb-2 mr-sm-2" required>	
			<option value="$countryD">Prevod z meny</option>
	<?php
    foreach($country as $countryD)
    echo "<option value ='$countryD'>$countryD</option>" 
	?>
		</select>
	</div>
	<div class="col-auto">
		<label class="visually-hidden" for="doMeny">Prevod do meny</label>
		<select id="doMeny" name="doMeny" class="form-control mb-2 mr-sm-2" required>
			<option value="$countryD">Prevod do meny</option>
	<?php
    foreach($country as $countryD)
    echo "<option value ='$countryD'>$countryD</option>" 
	?>
		</select>
	</div>
	<div class="col-auto">
		<button type="submit" class="btn btn-primary mb-2 mr-sm-2" name="vypis">></button> 
	</div>
	<div class="col-auto">
    <div class="form-control">
		 
           
        <?php //rate=kurz, volume =monzstvo
        $result = '';
        $c1 = $_POST['hodnota'];
        for($i =2; $i <count($csv);$i++)
        {
    
            $data = explode('|',$csv[$i]);
            $rate[] = $data[4];
            $volume[] = trim(str_replace(',','.',$data[2]));
        }
            if(isset($_POST['vypis']))
            {
            
                $n1 = array_search($_POST['zMeny'],$country);
                $n2 = array_search($_POST['doMeny'],$country);
                $result = ($c1*($rate[$n1])*($volume[$n2]))/(($volume[$n1])*($rate[$n2]));
            }
        ?>
      
        <input readonly="readonly" name="result" value="<?php echo $result; ?>">
	</div>
</div>  

</form>

<?php
include "indexFoot.php";
?>