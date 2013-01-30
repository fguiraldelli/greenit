<?php

include('sessao.php');
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $idp = $_POST["idp"];
    $tec = $_POST["tec"];

    $resu = mysql_query("SELECT id FROM `tecnologia` WHERE `nome` = '" . $tec . "'");
    $rowidt = mysql_fetch_array($resu);
    $idt = $rowidt["id"];
   
// Remove a tecnologia
    $sql = "DELETE FROM `proj-tec` WHERE idp=" . $idp .
            " AND idt=" . $idt;
     echo $sql;
    mysql_query($sql) or die(mysql_error());
}
?>
