<?php
session_start();

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

include_once('inc/spojenie.php');

$text = "
<style>
* {font-family: DejaVu Sans;}
td, th {padding: 2px 10px;}
th {background: #ffffaa}
</style>

<h3>Zoznam kníh</h3>
<table>
<thead>
	<tr>
    <th>ID</th>
    <th>Názov knihy</th>
    <th>Opis knihy</th>
    <th>Žáner</th>
    <th>Autor</th>
	</tr>
</thead>
<tbody>
";

$sql = "SELECT * FROM kniha LEFT JOIN autor ON Autor = autor.Cislo_autora ORDER BY Nazov_knihy";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    $text .= '<tr valign="top">';
	$text .= '<td>K'.$row['Cislo_zaznamu'].'</td>';
	$text .= '<td>'.$row['Nazov_knihy'].'</td>';
	$text .= '<td>'.$row['Popis_knihy'].'</td>';
	$text .= '<td>'.$row['Zaner'].'</td>';
	$text .= '<td>'.$row['Meno_autora'].' '.$row['Priezvisko_autora'].'</td>';
    $text .= '</tr>';
}
}
$text .= '</tbody></table>';


$dompdf->loadHtml($text);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // portrait/landscape

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('books.pdf');