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
    <th>spz</th>
    <th>termin</th>
    <th>pneumatiky</th>
    <th>kategoria_vozidla</th>
    <th>telefon<th>
	</tr>
</thead>
<tbody>
";
$sql = "SELECT * FROM servis_udaje";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) 
  {
    $text .= '<tr valign="top">';
	$text .= '<td>'.$row['spz'].'</td>';
    $text .= '<td>'.$row['termin'].'</td>';
    $text .= '<td>'.$row['pneumatiky'].'</td>';
	$text .= '<td>'.$row['kategoria_vozidla'].'</td>';
	$text .= '<td>'.$row['telefon'].'</td>';
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
$dompdf->stream('index.pdf');