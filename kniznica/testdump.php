
<?php
$dni = array(1 => "pondelok", 
3 => "utorok",5 => "streda",7 => "stvrtok",9 => "piatok",);
echo '<table class="table table-dark">';
for($i=1; $i<11; $i++)
{
    echo "<tr>";
    if($i % 2 == 0)
    {
     
        for($j=8; $j<13; $j++)
        {echo '<td> <a href="?den='.$i.'?cas='.$j.'" class="btn btn-warning btn-sm">'. $j .':00 </a> </td>';
            "</tr>";
        }
        
    }
    else

    {echo '<td>'. $dni[$i] .'</td>';
        
    }
    echo "</tr>";
}
echo '</table>';
?>
<style>
.btn-group button {
  background-color: #04AA6D; /
  border: none; 
  color: white; 
  text-align: center;
  padding: 5px 12px; /* Some padding */
  cursor: pointer; 
  float: left; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
  
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}
</style>
<body>
<table>

<tr>    
    <td>
    <style>div{text-align: center;}</style>
    <div> Pondelok</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Utorok</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Streda</div>  
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Štvrtok</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Piatok</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Sobota</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
<table>    
<tr>
    <td>
    <style>div{text-align: center;}</style>
    <div> Nedela</div>
    <div class="btn-group">
    <button type="submit" name="id" value="value">9:00</button>
    <button type="submit" name="id" value="value">10:00</button>
    <button type="submit" name="id" value="value">11:00</button>
    <button type="submit" name="id" value="value">12:00</button>
    </div></td>
</tr>
</table>
</div>
</body>