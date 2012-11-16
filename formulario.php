<?php
include("connection.php");

$q = $_GET['q'];
/*if (($q == NULL) || ($q < 1) || ($q > 14))
    header("location: formulario.php?q=1");*/
$sql = "SELECT * FROM questoes where id = " . $q;
$res = mysql_query($sql);
$cont = 0;
while($row = mysql_fetch_array($res)){
    $cont++;
    echo $row['id'] . " " . $row['questao'] . "<br>";
}

?>
