<?php
include("connection.php");
//$sql = "SELECT * FROM questoes where id = " . $cont;
$sql = "SELECT * FROM questoes";
$result = mysql_query($sql);
echo "<table>";
echo "<tr><td></td>";
$linhas = mysql_num_rows($result);
$i = $linhas / 2;
while ($i < $linhas) {
    echo "<td>" . mysql_result($result, $i, 1) . "</td>";
    $i++;
}
echo "</tr>";
$i = 0;
while ($i < $linhas / 2) {
    echo "<tr><td>" . mysql_result($result, $i, 1) . "</td>";
    for ($j = 0; $j < $linhas / 2; $j++) {
            print "<td> </td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";
?>
