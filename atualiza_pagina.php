<?php

include("sessao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $idu = $_SESSION["idu"];
    $q = $_POST["q"];
    $resp = $_POST[$q];
    $just = $_POST["just"];
    
    $data = date("Y-m-d");
    
    $sql = "SELECT * FROM respostas WHERE idu=" . $idu .
        " AND idq=" . $q . " AND data=" . $data;
    $res = mysql_query($sql);
    if($res){
        $sql = "UPDATE respostas SET resp = " . $resp . ", just = " . $just . 
                " WHERE idu=" . $idu . " AND idq=" . $q . " AND data='" . $data . "'";
    }else{
        $sql = "INSERT INTO respostas (idu, idq, resp, just, data) VALUES " . 
            "(" . $idu . ", " . $q . ", " . $resp . ", " . $just . ", '" . $data . "')";
    }
    $resResp = mysql_query($sql);

    $pag = $q + 1;
    $url = "Location: formulario.php?q=". $pag;
    echo $url;
    if($q < 14)
        header($url);
}
?>
