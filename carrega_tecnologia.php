<?php

include('sessao.php');
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
$idp=$_POST["idp"];
$tec=$_POST["tec"];

$resu = mysql_query("SELECT id FROM `tecnologia` WHERE `nome` = '" . $tec . "'");
$rowidt = mysql_fetch_array($resu);
$idt = $rowidt["id"];

$res=  mysql_query("SELECT * FROM `proj-tec` WHERE idp=" . $idp . 
        " AND idt=" . $idt);

$row = mysql_fetch_array($res);
echo $row["descricao"];
// Executa a consulta
//$resp = mysql_query($sql) or die(mysql_error());

}
?>
