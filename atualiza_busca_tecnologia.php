<?php
include('sessao.php');
include('connection.php');

// Verifica se foi feito uma requisicao
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Recupera a busca
    $busca = $_POST["nome"];

    // Joga a busca na sessao
    $_SESSION["busca_tec"] = $busca;


    //echo $_SESSION["idp"];
    //die();
    $url = "Location: index.php?r=pesquisa_tecnologia";

    header($url);
}

?>
