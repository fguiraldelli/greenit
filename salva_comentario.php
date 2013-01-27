<?php

include('sessao.php');
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
$idp=$_POST["idp"];
$idqn=$_POST["idqn"];
$idqs=$_POST["idqs"];
$comentario=  mysql_real_escape_string($_POST["comentario"]);

$res=  mysql_query("SELECT * FROM comentario WHERE idp=" . $idp . " AND
      idqn=" . $idqn . " AND idqs=" . $idqs);

if(mysql_num_rows($res)){
    $sql = "UPDATE `comentario` SET `comentario` = '" . $comentario .
                "' WHERE `idp`=" . $idp . " AND `idqn`=" . $idqn .
                " AND `idqs`=" . $idqs;
}else{
    $sql="INSERT INTO `comentario` (`idp`, `idqn`, `idqs`, `comentario`) VALUES (" . $idp . "," . $idqn . "," . $idqs . ",'" . $comentario . "')";

}


// Executa a consulta
$resp = mysql_query($sql) or die(mysql_error());

}
?>
