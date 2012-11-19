<?php

include("connection.php");
$sql = "SELECT * FROM questoes";
$result = mysql_query($sql);
echo "<table class = resultado>";
echo "<tr><td class=s0></td>";
$linhas = mysql_num_rows($result);
$i = 0;
/*Imprime as perguntas da coluna*/
while ($i < $linhas/2) {
    echo "<td class=s0>" . mysql_result($result, $i, 1) . "</td>";
    $i++;
}
echo "</tr>";
$i = $linhas / 2;
/*Imprime as perguntas da linha e colore a célula da tabela*/
while ($i < $linhas) {
    echo "<tr><td class=s0>" . mysql_result($result, $i, 1) . "</td>";
    for ($j = 0; $j < $linhas/2; $j++) {
        switch ($j){
                        case 0:
                            print "<td class = s1> </td>";
                            break;
                        case 1:
                            print "<td class = s2> </td>";
                            break;
                        case 2:
                            print "<td class = s3> </td>";
                            break;
                        case 3:
                            print "<td class = "."'s4'". "> </td>";
                            break;
                        case 4:
                            print "<td class = "."'s5'". "> </td>";
                            break;
                        case 5:
                            print "<td class = "."'s6'". "> </td>";
                            break;
                        case 6:
                            print "<td class = "."'s7'". "> </td>";
                            break;
                        default : print "<td class = "."'s4'". "> </td>";
                    }
        //print "<td> </td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";
?>
