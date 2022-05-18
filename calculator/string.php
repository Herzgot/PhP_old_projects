<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Spracovanie textu</h1>
<?php
$text = 'Ahoj Domokun, ako sa máš?';
// pocet znakov
echo mb_strlen($text);

echo"<hr>";
// pocet slov
echo str_word_count($text);

echo"<hr>";
//pozicia
echo strpos($text, 'ako');

echo"<hr>";
//nahrada textu
echo str_replace('Domokun', 'Frantisek', $text);

echo"<hr>";
//vyber textu podla pozicie
echo substr($text, 5, 4). "<br>";
echo substr($text, 5, 5);

echo "<hr>";
// rozdelenie do pola na zaklade medzery
$text1 = str_replace('?','',str_replace(',','',$text));
$pole = explode(" ",$text1);
var_dump($pole);
echo count($pole);

echo "<hr>";
// vytvorenie retazca na zaklade pola - oddelovac/
echo implode('*/*',$pole);

echo "<hr>";
//vyhladanie retazca
/*
$=1 porovnava ako cislo
$==1 porovnava ako retazec
$===1 porovnava ako hodnost?*/ 
if(strpos($text, 'Ahoj') !==false)
    echo str_replace('Ahoj','<mark style="background:pink">Ahoj</mark>',$text);
else 
    echo 'nie';
?>

<h3>Práca s časom</h3>


<?php
echo "<hr>";
//generovanie datumu
$datumNarodenia = mktime(12,0,0,12,24,1972);
echo "Stroj:" . $datumNarodenia . "<br>";
echo "Clovek: " . date('d.m.Y H:i:s', $datumNarodenia) . "<br>";

echo "<hr>";
//generovanie datumu +14 mesicaov
//tento system je lepsi 
$datumNarodeniaPlus = mktime(12,0,0,12,24+14,1972);
echo "Clovek: " . date('d.m.Y H:i:s', $datumNarodeniaPlus) . "<br>";
echo "Teraz: " . date('d.m.Y H:i:s') . "<br>";
echo "O dva tyzdne " . date('d.m.Y H:i:s', time() + 14*24*60*60) . "<br>";
echo date('l jS \of F Y h:i:s a') . "<br>";

var_dump(getdate()); 

?>

<?php
include "indexFoot.php";
?>