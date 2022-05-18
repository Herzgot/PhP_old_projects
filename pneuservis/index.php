<?php
include_once "indexHead.php";
?>

<h1 class="mt-5 mb-4;" style="text-align:center;">Rezervácie</h1>

<p style="text-align:center; font-size:14px; margin-right: 20%; margin-left: 20%;">Pre objednanie prezutia motocyklov, prosím volajte 02 6820 6080.
Časová náročnosť je často väčšia, než rezervácie polhodinového termínu. Ďakujeme
Vážení zákazníci, na rovnaký termín je možné rezervovať až 3 autá.
Ak teda po Vašej rezervácii zostáva políčko stále zelené, znamená to len to, že nie sú zatiaľ obsadené všetky servisná miesta. </p>
<?php
   

   $dni = array(1 => "pondelok", 
   3 => "utorok",5 => "streda",7 => "stvrtok",9 => "piatok",);
   echo '<table class="table table-dark">';
   for($i=1; $i<11; $i++)
   {
	   echo "<tr>";
	   if($i % 2 == 0)
	   {
		
		   for($j=8; $j<13; $j++)
		   {echo '<td> <a href="?den='.$i.'&cas='.$j.'" class="btn btn-warning btn-sm">'. $j .':00 </a> </td>';
		   }
		   
	   }
	   else
   
	   {echo '<td>'. $dni[$i] .'</td>';
		   
	   }
	   echo "</tr>";
   }
   echo '</table>';
?>
<?php

?>
<?php
$kategoria_vozidla='';
$pnematiky='';
$spz='';
$krajina='';
$psc='';
$mesto='';
$ulica=''; 
$telefon='';
$r='';
$p='';
if(isset($_GET['den']) && isset($_GET['cas']))
{
	$r = intval($_GET['den']);
    $p = intval($_GET['cas']);
	$sql = "SELECT * FROM servis_udaje WHERE termin = " . $r.$p . " LIMIT 1";
	var_dump($sql);
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$kategoria_vozidla = $row['kategoria_vozidla'];
		$spz = $row['spz'];
        $pneumatiky= $row['pneumatiky'];
        $krajina= $row['krajina'];
        $psc= $row['psc'];
        $mesto= $row['mesto'];
        $ulica= $row['ulica']; 
        $telefon= $row['telefon'];
		
	}
}


?>

<form action="testformsave.php" method="post" class="form-horizontal">
		<input type="text" name="termin" readonly value="<?php echo $r.$p; ?>">
        <br>
			<label for="spz" class="col-sm-2 control-label">ŠPZ</label>

				<input type="text" class="form-control" id="spz" name="spz" value="<?php echo $spz;?>" required>
                <br>
				<label for="kategoria_vozidla" class="col-sm-2 control-label">Kategória vozidla</label>
			
					<select class="form-control" id="kategoria_vozidla" name="kategoria_vozidla" required>
						
                        <?php
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
                    <br>
			<label for="kategoria_vozidla" class="col-sm-2 control-label">Pneumatiky servis</label>	
			<select class="form-control" id="pneumatiky" name="pneumatiky" required>
				
				<?php
						$pneu = array("ANO = 50", "NIE");
						foreach($pneu as $pneus)
						{
							if($pneumatiky == $pneus)
								echo "<option value='$pneus' selected> $pneus</option>";
							else
								echo "<option value='$pneus'>$pneus</option>";
						}
				?>
	
			</select>
			<br>
			<label for="krajina" class="col-sm-2 control-label">Krajina</label>
		
				<input type="text" class="form-control" id="krajina" name="krajina" value="<?php echo $krajina;?>" required>
                <br>                  
	
			<label for="psc" class="col-sm-2 control-label">PSČ</label>
		
				<input type="text" class="form-control" id="psc" name="psc" value="<?php echo $psc;?>" required>
                <br>                  
	
			<label for="mesto" class="col-sm-2 control-label">Mesto</label>
		
				<input type="text" class="form-control" id="mesto" name="mesto" value="<?php echo $mesto;?>" required>
                <br>
	
			<label for="ulica" class="col-sm-2 control-label">Ulica</label>
		
				<input type="text" class="form-control" id="ulica" name="ulica" value="<?php echo $ulica;?>"required>
                <br>
	
			<label for="telefon" class="col-sm-2 control-label">Telefón</label>
		
				<input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $telefon;?>">
                <br>
			<input class = "btn btn-primary" type="submit">				
	
	


</form>
<hr>

<h3>PDF faktura</h3>

<a href="test_pdf.php" class="btn btn-info btn-sm">PDF</a>




</tbody>
</table>

<?php
//include_once "indexFoot.php";
?>