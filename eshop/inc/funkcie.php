<?php
// Funkcia na kontrolu pred pouzitim v SQL dotaze
function checkDBInput($in, $entities = 0)
{
	// $in - lubovolna vstupna hodnota
	// $entities:
	// 0/nic: odstrani HTML znacky,  
	// 1: nahradi HTML znacky za entity,
	// 2: validuje na integer,
	// 3: validuje na desatinne cislo
	global $conn;

	// Odstrani "prazdne znaky" pred a za 
	$in = trim($in);

	if($entities == 1)
		$in = htmlspecialchars($in);
	elseif($entities == 2)
		$in = intval($in);
	elseif($entities == 3)
		$in = (float) str_replace(',', '.', $in);
	else
		$in = strip_tags($in);

	return mysqli_real_escape_string($conn, $in);
}

// Funkcia na zobrazenie textoveho boxu
function showBox($text, $type = 'warning', $close = 1)
{
	$out = '<br><div class="alert alert-' . $type . ' alert-dismissable">' . PHP_EOL;
	if($close)
		$out .= '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . PHP_EOL;
	$out .= $text;
	$out .= '</div>' . PHP_EOL;
	
	return $out;
}

// Kontrola ci je uzivatel admin 
function isAdmin()
{
	global $conn;
	if(isset($_SESSION['cislo_zakaznika']) && $_SESSION['cislo_zakaznika'])	
	{		
		$idUser = intval($_SESSION['cislo_zakaznika']);
		$sql = "SELECT rola FROM zakaznik WHERE cislo_zakaznika = '$idUser'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0) 
		{
			$row = mysqli_fetch_assoc($result);
			if($row['rola'] == 'admin')
				return true;
		}
	}
	return false;
}