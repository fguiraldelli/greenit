<?php

include('sessao.php');
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print "<br>" . $_POST["op"] . "-op<br>";
    print "<br>" . $_POST["vaiprafrente"] . "-frente<br>";
    $idu = $_SESSION["idu"];
    $idp = $_SESSION["idp"];
    print $idu . " = idu<br>";
    $q = $_POST["q"];
    print "<br> q= " . $_POST['q'] . "<br>"; //die();
    $resp = $_POST[$q];
    if (!isset($_POST[$q])) {
        echo 'Faltou responder!!!!!';
    }
    print "resposta: " . $_POST[$q] . "<br>";
    $just = $_POST["just"];


    $data = date("Y-m-d");

    $sql = "SELECT * FROM respostas WHERE idp=" . $idp .
            " AND idq=" . $q;
    print $sql . "<br>";
    $res = mysql_query($sql);
    $linhas = mysql_num_rows($res);
    print "<br>linhas = " . $linhas . "<br>";

    if ($just == '')
        $just = "sem justificativa";

    if ($linhas) {
        $sql = "UPDATE respostas SET `resp` = " . $resp . ", `just` = '" . $just .
                "' WHERE `idp`=" . $idp . " AND `idq`=" . $q;
        print $sql . "<br>"; //die();
    } else {
        $sql = "INSERT INTO `respostas` (`idp`, `idq`, `resp`, `just`) VALUES " .
                "(" . $idp . ", " . $q . ", " . $resp . ", '" . $just . "')";
        print $sql;
        die();
    }
    /* $resResp = */
    mysql_query($sql);


    //echo $url;
    print "op e " . $_POST["vaiprafrente"] . "<br>";
    $op = $_POST['vaiprafrente'];
    if ($op == 'a') {
        if ($q > 0) {
            $pag = $q - 1;
        }
    } else {
        if ($q < 29) {
            $pag = $q + 1;
        } else {
            header("Location: index.php?r=tabela");
        }
        //echo $sql;
    }

    $url = "Location: index.php?r=form&q=" . $pag;
    header($url);
}
?>