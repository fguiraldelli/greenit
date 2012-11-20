<?php

//include("sessao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $idu = $_SESSION["idu"];
    $q = $_POST["q"];
    $resp = $_POST[$q];
    $just = $_POST["just"];
    
    $data = date("Y-m-d");
    echo $data;
    
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
    echo $sql;
}
?>
