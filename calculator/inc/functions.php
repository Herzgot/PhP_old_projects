<?php
// ********************************
// CVICENIE 3
// ********************************

// Funkcia na zobrazenie alert-boxu
function showBox($text, $color='info', $close=1)
{
	echo '<div class="alert alert-' . $color . ' alert-dismissible">' . PHP_EOL;
	if($close == 1) // if($close) 
		echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . PHP_EOL;	 
	echo $text . PHP_EOL;
	echo '</div>' . PHP_EOL; 
}

// Funkcia na vypocet fakturacie
function factorial($n)
{
	$f = 1;
	for($i = 1; $i <= $n; $i++)
	{
		$f = $f * $i;	// $f *= $i;
	}

	return $f;
}

// Funkcia na vykreslenie tabulky
function myTable($r, $c, $t = 1)
{
	// Zaciatocne udaje pre vyplnenie buniek
	if($t == 1)
		$data = 0;
	elseif($t == 2)
		$data = $r * $c + 1;

	$table = '<table class="table table-bordered">';
	for($i = 1; $i <= $r; $i++)
	{
		$table .= '<tr>';
		for($j = 1; $j <= $c; $j++)
		{
		
			if($t == 1)
				$data++;
			elseif($t == 2)
				$data--;
			elseif($t == 3)
				$data = $i;
			else
				$data = $j;
			
			$table .= '<td>' . $data . '</td>';
		}
		$table .= '</tr>';
	}
	$table .= '</table>';	
	
	return $table;
}

// ********************************
// CVICENIE 4
// ********************************

// Vlastna funkcia na vyhladavanie
function vyhladaj($hladaj, $r)
{
	// Polu $pole pridame vlastnost globalneho pola - inak by vo vnutri
	// funkcie neexistovalo
	global $pole; 

	// Ak nie je definovany retaze pre vyhladavanie - zobraz cely/vsetky riadok/riadky


	// Vyber iba dany riadok ($r)

	// Ak sa udaj nachadza v 1. stlpci - vrat cely riadok

	// Ak nie je v 1. stplci - hladaj v 2. stlpci. Ak sa udaj nachadza v 2. stlpci - vrat cely riadok

	// Ak nie je v 1. a 2. stplci - hladaj v 3. stlpci. Ak sa udaj nachadza v 3. stlpci - vrat cely riadok


	// Ak sa nenachadza v ziadnom stlpci - vrat false => nezobrazuj riadok
	return false; 
}