<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Polia (Array)</h1>

<h3 class="mt-3 mb-2">Indexové pole</h3>

<?php
$pole1 = array(2, 'ahoj', 'Peter', 3.14);
$pole1[] = 10;
$pole1[] = 'text';
$pole1[50] = 20;
$pole1[] = 10;

echo "<pre>";
print_r($pole1);
echo "</pre>";
var_dump($pole1);
echo $pole1[2];
?>

<h3 class="mt-3 mb-2">Asociatívne pole</h3>

<?php
$day = array(
    'Mon' => 'Pondelok',
    'Tue' => 'Utorok',
    'Wed' => 'Streda'
);
$day['Thu'] = 'Stvrtok';
$day['Fri'] = 'Piatok';
$day['Sat'] = 'Sobota';
$day['Sun'] = 'Nedela';


print_r($day);
echo '<br>';
echo $day['Mon'] . '<br>';
echo date('D') . '<br>';
echo $day[date('D')] . '<br>';
echo implode(', ', $day);
?>

<h3 class="mt-3 mb-2">Dvojrozmerné pole</h3>

<?php
$dayEn = array(
    'Mon' => 'Monday',
    'Tue' => 'Tuesday',
    'Wed' => 'Wednesday'
);
$day['Thu'] = 'Thursday';
$day['Fri'] = 'Friday';
$day['Sat'] = 'Saturday';
$day['Sun'] = 'Saunday';

$days = array('sk' => $day, 'en' => $dayEn);
echo "<pre>";
print_r($days);
echo "</pre>";
echo '<br>';
?>

<h3 class="mt-3 mb-2">Využitie cyklov for, foreach a while pri práci s poľami</h3>

<?php
for($i = 0; $i< count($pole1); $i++)
{
    echo $i . ':' . $pole1[$i] . '<br>';
}
foreach($pole1 as $kluc => $hodnota)
{
    echo $kluc . ':' . $hodnota . '<br>';
}
foreach($pole1 as $hodnota) 
echo '<br>';
$i = 0;
while($i < count($pole1))
{
    echo $i . ':' . $pole1[$i++] . '<br>';
}
?>


<?php
include "indexFoot.php";
?>