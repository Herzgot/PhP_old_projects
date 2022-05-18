<?php
include "indexHead.php";
?>

<h1 class="mt-5 mb-4">Práca s poľom</h1>
<?php    

?>
<h3 class="mb-4"> Formuár na editáciu údajov</h3>
<form action="" method="post" class="mb-5">     
<div class="form-group row mb-3 mt-3">
    <label for="zlucenina" class="col-sm-2 col-form-label">Substance</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="zlucenina" name="zlucenina" 
            value="">
    </div>
</div>
<div class="form-group row mb-3 mt-3">
    <label for="cas_no" class="col-sm-2 col-form-label">CAS No.</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="cas_no" name="cas_no" 
            value="">
    </div>
</div>  
<div class="form-group row mb-3 mt-3">
    <label for="trieda" class="col-sm-2 col-form-label">Class</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="trieda" name="trieda" 
            value="">
    </div>
</div>  
<button type="button" class="btn btn-primary">Upraviť</button>     
</form>

<!-- Formular na vyhladavanie textu vo vsetkych polozkach pola --> 
<form action="" method="post" class="mb-5">
    <div class="form-group">
        <label for="hladaj">Vyhľadávanie v poli</label>
        <input type="text" class="form-control" id="hladaj" name="hladaj" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3 mb-3">Vyhľadaj</button>
</form>

<?php
include ('data/pole.txt'); // include 'data/pole.txt'
echo '<table class="table table-striped">';
echo '<thead>';
echo '<tr>';
echo '<th>#</th><th>Nazov</th><th>CAS #</th><th>Tried</th>';
echo '<tr>';
echo '</thead>';

echo '<tbody>';
foreach($pole as $k => $v)
{
    echo '<tr>';
    echo '<td>' . ($k +1). '</td>';
    echo '<td>' . $pole[$k]['zlucenina']. '</td>';
    echo '<td>' . $v['cas_no']. '</td>';
    echo '<td>' . $v['trieda']. '</td>';
    echo '<tr>';
    // $pole[$k]['zlucenina']  === $v['zlucenina']
}
echo '</tbody>';

echo '</table>';
?>

<?php
include "indexFoot.php";
?>