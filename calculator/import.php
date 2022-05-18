<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Importy</h1>

<h3 class="mt-4 mb-2">import.csv</h3>
<?php
if(file_exists('data/import.csv'))
{
    $csv = file('data/import.csv');
    echo '<table class="table table-striped">';
    echo '<thead>';
    
    echo '<tr>';
    $bunkyH = explode(';',$csv[0]);
    foreach($bunkyH as $bunka)
    {
        echo "<th>$bunka</th>";
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    for($i =1; $i <count($csv);$i++)
    {
            echo '<tr>';
            $bunkyD = explode(';',$csv[$i]);
            foreach($bunkyD as $bunka)
        {
            echo "<td>$bunka</td>";
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

?>

<h3 class="mt-4 mb-2">Import.txt</h3>
<?php
if(file_exists('data/Import.txt'))
{
    $csv = file('data/Import.txt');
    echo '<table class="table table-striped">';
    echo '<thead>';
    
    echo '<tr>';
    $bunkyH = explode("\t",$csv[0]);
    foreach($bunkyH as $bunka)
    {
        echo "<th>$bunka</th>";
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    for($i =1; $i <count($csv);$i++)
    {
            echo '<tr>';
            $bunkyD = explode("\t",$csv[$i]);
            foreach($bunkyD as $bunka)
        {
            echo "<td>$bunka</td>";
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

?>
        //In novy riadok , Ir yaciatok riadka, It tabulator, "\t" - prida tab medzeru 
<h3 class="mt-4 mb-2">cennik_nbs_1.txt</h3>
<?php
if(file_exists('data/cennik_nbs_1.txt'))
{
    $csv = file('data/cennik_nbs_1.txt');
    echo '<table class="table table-striped">';
    echo '<tbody>';
    for($i =0; $i <count($csv);$i++)
    {
            echo '<tr>';
            $row = $csv[$i];

            echo '<td>' . trim(mb_substr($row, 3 , 16)) . '</td>';
            echo '<td>' . trim(mb_substr($row, 19 , 10)) . '</td>';
            echo '<td>' . trim(mb_substr($row, 30 , 5)) . '</td>';
            echo '<td>' . trim(mb_substr($row, 35 , 3)) . '</td>';
            echo '<td>' . trim(mb_substr($row, 38 , 9)) . '</td>';
            $datum = trim(mb_substr($row, 48 , 8));
            $rok = substr($datum, 0, 4);
            $mesiac = substr($datum, 4, 2);
            $den = substr($datum, 6, 2);
            $datum1 = $den.'.'.$mesiac.'.'.$rok;
            $datum1 = intval($den).'.'.intval($mesiac).'.'.$rok;
            echo '<td>' . $datum1 . '</td>';

            echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}
?>

<?php
include "indexFoot.php";
?>