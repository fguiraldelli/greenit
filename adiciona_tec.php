<?php

include('sessao.php');
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $tec = addslashes($_POST["tec"]);

    $sql = "INSERT INTO `tecnologia` (`nome`) VALUES ('" . $tec . "')";

    // Executa a consulta
    mysql_query($sql) or die(mysql_error());
}

?>
