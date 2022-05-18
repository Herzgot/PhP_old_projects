<?php
session_start();

/** PHPExcel */
require_once('vendor/autoload.php');

/** Includovanie funkcii */
include_once('inc/spojenie.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/** Nastavenie zltej farby pre prvy riadok */
$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'color' => [
            'argb' => 'FFFFFF00',
        ]
    ],
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

/** Vyplnenie buniek udajmi */

// Prvy riadok
$sheet->setCellValue('A1','ID');
$sheet->setCellValue('B1','Názov knihy');
$sheet->setCellValue('C1','Opis knihy');
$sheet->setCellValue('D1','Žáner');
$sheet->setCellValue('E1','Autor');

// Dalsie riadky
$sql = "SELECT * FROM kniha LEFT JOIN autor ON Autor = autor.Cislo_autora ORDER BY Nazov_knihy";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $r = 1;
  while($row = mysqli_fetch_assoc($result)) 
    {
    $r++;
    $sheet->setCellValue('A'.$r, 'K'.$row['Cislo_zaznamu']);
	$sheet->setCellValue('B'.$r, $row['Nazov_knihy']);
	$sheet->setCellValue('C'.$r, $row['Popis_knihy']);
    $sheet->setCellValue('D'.$r, $row['Zaner']);
    $sheet->setCellValue('E'.$r, $row['Meno_autora'].' '.$row['Priezvisko_autora']);
    }
}
$sheet->getStyle('A1:E1')->applyFromArray($styleArray)

// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats- officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="authors.xlsx"');
header('Cache-Control: max-age=0');

$writer = PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;
