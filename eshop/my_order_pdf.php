<?php
session_start();

// include autoloader
require 'vendor/autoload.php';
require 'inc/spojenie.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$text = "
<style>
* {font-family: DejaVu Sans; font-size: 10pt;}
h1 {font-size: 14pt;}
td, th {padding: 2px 10px;}
th {background: #ffffaa}
</style>

<h1>Detail objednávky</h1>
<table>
<thead>
    <tr>
        <th>Tovar</th>
        <th>Počet kusov</th>
        <th>Cena za kus</th>
    </tr>    
</thead>
<tbody>";

if(isset($_GET['objednavka']))
{
	$objednavka = $_GET['objednavka'];		
}

$sql = "SELECT * FROM order_list JOIN tovar ON polozka = cislo_tovaru WHERE order_list.order = $objednavka ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
    	$text .= '<tr>';
		$text .= '<td>' . $row['nazov'] . '</td>';
		$text .= '<td>' . $row['pocet'] . '</td>';
		$text .= '<td>' . $row['cena'] . '€</td>';
		$text .= '</tr>';
	}
}
$text .= "</tbody></table>";

$dompdf->loadHtml($text);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // portrait/landscape

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('objednavka.pdf');