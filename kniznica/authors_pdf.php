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

<h3>Zoznam autorov</h3>
<table>
<thead>
	<tr>
		<th>ID</th>
		<th>Meno</th>
		<th>Priezvisko</th>

	</tr>
</thead>
<tbody>
";

$sql = "SELECT * FROM autor ORDER BY Priezvisko_autora";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    $text .= '<tr>';
	$text .= '<td>A'.$row['Cislo_autora'].'</td>';
	$text .= '<td>'.$row['Meno_autora'].'</td>';
	$text .= '<td>'.$row['Priezvisko_autora'].'</td>';
    $text .= '</tr>';
}
}

// mysqli_close($conn);



$text .= '</tbody></table>';

$dompdf->loadHtml($text);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait'); // portrait/landscape

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('authors.pdf');