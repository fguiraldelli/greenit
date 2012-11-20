<?php

include ("sessao.php");
include("connection.php");
$data = date("Y-m-d");
$sql = "SELECT * FROM questoes";
$sql2 = "SELECT * FROM respostas WHERE idu = " . $_SESSION["idu"] . " AND data = '" . $data . "'";
$result_user = mysql_query($sql2);
$data_user = mysql_fetch_array($result_user);
$result = mysql_query($sql);
echo "<table class = resultado>";
echo "<tr><td class=s0></td>";
$linhas = mysql_num_rows($result);
/*for ($k = 0; $k < $linhas; $k++) {
    print "user" . mysql_result($result_user, $k, 0) . "<br>";
    print "questao" . mysql_result($result_user, $k, 1) . "<br>";
    print "resp" . mysql_result($result_user, $k, 2) . "<br>";
}*/
$i = 0;
/* Imprime as perguntas da coluna */
while ($i < $linhas / 2) {
    echo "<td class=s0>" . mysql_result($result, $i, 1) . "</td>";
    $i++;
}
echo "</tr>";
$i = $linhas / 2;
/* Imprime as perguntas da linha e colore a célula da tabela */
while ($i < $linhas) {
    echo "<tr><td class=s0>" . mysql_result($result, $i, 1) . "</td>";
    for ($j = 0; $j < $linhas / 2; $j++) {
        print "<td class = s".  mysql_result($result_user, $i, 2) . 
                mysql_result($result_user, $j, 2) ."> </td>";
        //print "<td> </td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";
?>
