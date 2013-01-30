<?php

include('sessao.php');
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
$idp=$_POST["idp"];
$tec=$_POST["tec"];
$conf=$_POST["conf"];
$comentario = addslashes($_POST["comentario"]);

$resu = mysql_query("SELECT id FROM `tecnologia` WHERE `nome` = '" . $tec . "'");
$rowidt = mysql_fetch_array($resu);
$idt = $rowidt["id"];

$res=  mysql_query("SELECT * FROM `proj-tec` WHERE idp=" . $idp . 
        " AND idt=" . $idt);

if(mysql_num_rows($res)){
    $sql = "UPDATE `proj-tec` SET `descricao` = '" . $comentario . 
                "', `confidencial` = " . $conf .
                " WHERE `idp`=" . $idp . " AND `idt`=" . $idt;
}else{
    $sql="INSERT INTO `proj-tec` (`idp`, `idt`, `confidencial`) VALUES (" . $idp .
            "," . $idt . "," . $conf . ")";

}

// Executa a consulta
$resp = mysql_query($sql) or die(mysql_error());

}
?>
