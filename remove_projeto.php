<?php

include('sessao.php');
include('connection.php');

// Verifica se foi feito uma requisicao
if ($_SERVER['REQUEST_METHOD'] == "POST") {
     // Recupera o ID do usuario
    $tipo = $_POST["tipo"];
    $idu = $_SESSION["idu"];
    // Recupera o Titulo do Projeto
    $titulo = $_POST["nome-proj"];
     // Recupera o Titulo do Projeto
    $idp = $_POST["projeto"];
    // Recupera a descricao do Projeto
    $desc = $_POST["descr-proj"];
    // Recupera a data
    $data = date("Y-m-d");
    //print "título:".$titulo;
    //die();
    // Joga o id do projeto na sessao
    $_SESSION["idp"] = $idp;
    // Joga o titulo do projeto na sessao
    $_SESSION["titulopj"] = $titulo;
    
    $sql = "delete from `projeto` where idp = " . $idp;
    $result = mysql_query($sql);
    print "sql: ".$sql."<br>";
    echo "idp: ".$_SESSION["idp"]."<br>";
    print "tipo= ". $tipo."<br>";
    print "result= ". $result."<br>";
    $url = "Location: index.php?r=projeto";
    header($url);
    
}
?>

