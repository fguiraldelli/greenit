<?php

include('sessao.php');
include('connection.php');

// Verifica se foi feito uma requisicao
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Recupera o ID do usuario
    $idu = $_SESSION["idu"];
    // Recupera o Titulo do Projeto
    $titulo = $_POST["nome-proj"];
    // Recupera a descricao do Projeto
    $desc = $_POST["descr-proj"];
    // Recupera a data
    $data = date("Y-m-d");
    
    // Cria um novo projeto no BD
    // Cria a query
    $sql = "INSERT INTO projeto (idu, titulo, descr, data) VALUES (" .
               $idu . ", '" . $titulo . "', '" . $desc . "', '" . $data . "')";
    // Executa a query
    mysql_query($sql);
    
    // Recupera o id do projeto
    // Cria a query
    $sql = "SELECT idp FROM projeto WHERE idu=" . $idu . " AND titulo='" .
            $titulo . "' AND data='" . $data . "'";
    // Executa a query
    $res = mysql_query($sql);
    // Recupera as respostas da query
    $idp = mysql_fetch_array($res);
    // Joga o id do projeto na sessao
    $_SESSION["idp"] = $idp["idp"];
    // Joga o titulo do projeto na sessao
    $_SESSION["titulopj"] = $titulo;
    
    
    echo $_SESSION["idp"];
    
    
    $url = "Location: index.php?r=form&q=1";
    header($url);
    
}

?>
