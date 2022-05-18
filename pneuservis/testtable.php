   
<html>
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
</html>