<?php
include("connection.php");

$q = $_GET['q'];
/* Recupera a questao */
if (($q == NULL) || ($q < 1) || ($q > 14))
    header("location: formulario.php?q=1");
$sql = "SELECT * FROM questoes where id = " . $q;
$res = mysql_query($sql);
$cont = 0;
while($row = mysql_fetch_array($res)){
    $cont++;
    echo $row['id'] . " " . $row['questao'] . "<br>";

    /* Recupera as possiveis respostas */
    $sql = "SELECT * FROM tipo_resposta WHERE tipo = " . $row['tipo'];
    $resresp = mysql_query($sql);
    while($rowresp = mysql_fetch_array($resresp)){
        echo "<input type=\"radio\" name=\"" . $row['id'] . "\" value=\"" . 
                $rowresp['resp'] . "\"";
       /* if(){
            
        }*/
        echo "/>" . $rowresp['rotulo'];
    }

}
?>
