<?php

include("sessao.php");
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $op = "p";
    print "<br>".$_POST["op"]."-op<br>";
    print "<br>".$_POST["vaiprafrente"]."-frente<br>";
    $idu = $_SESSION["idu"];
    $q = $_POST["q"];
     print "<br>".$_POST['q']."<br>";
    $resp = $_POST[$q];
    $just = $_POST["just"];

    $data = date("Y-m-d");

    $sql = "SELECT * FROM respostas WHERE idu=" . $idu .
            " AND idq=" . $q . " AND data='" . $data . "'";
    $res = mysql_query($sql);
    $linhas = mysql_num_rows($res);
    if ($linhas) {
        $sql = "UPDATE respostas SET `resp` = " . $resp . ", `just` = '" . $just .
                "' WHERE `idu`=" . $idu . " AND `idq`=" . $q . " AND `data`='" . $data . "'";
    } else {
        $sql = "INSERT INTO `respostas` (`idu`, `idq`, `resp`, `just`, `data`) VALUES " .
                "(" . $idu . ", " . $q . ", " . $resp . ", '" . $just . "', '" . $data . "')";
    }
    /* $resResp = */
    mysql_query($sql);


    //echo $url;
    print "op e " . $_POST['vaiprafrente'] . "<br>";
    if ($op == 'a') {
        if ($q > 1) {
            $pag = $q - 1;
        }
    } else {
        if ($q < 15) {
            $pag = $q + 1;
        }
        else{
            header("Location: index.php?r=tabela");
        }
        //echo $sql;
    }
    $url = "Location: formulario.php?q=" . $pag;
    header($url);
}
?>