<?php
include('sessao.php');
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print "<br>".$_POST["op"]."-op<br>";
    print "<br>".$_POST["vaiprafrente"]."-frente<br>";
    $idu = $_SESSION["idu"];
    print $idu." = idu<br>";
    $q = $_POST["q"];
    print "<br>".$_POST['q']."<br>";
    $resp = $_POST[$q];
    $just = $_POST["just"];

    $data = date("Y-m-d");

    $sql = "SELECT * FROM respostas WHERE idu=" . $idu .
            " AND idq=" . $q ;
    print $sql."<br>";
    $res = mysql_query($sql);
    $linhas = mysql_num_rows($res);
    print "<br>linhas = ".$linhas."<br>";
    
    if($just=='') $just = "sem justificativa";
    
    if ($linhas) {
        $sql = "UPDATE respostas SET `resp` = " . $resp . ", `just` = '" . $just .
                "' WHERE `idu`=" . $idu . " AND `idq`=" . $q;
        print $sql."<br>";//die();
    } else {
        $sql = "INSERT INTO `respostas` (`idu`, `idq`, `resp`, `just`, `data`) VALUES " .
                "(" . $idu . ", " . $q . ", " . $resp . ", '" . $just . "', '" . $data . "')";
        print $sql;//die();
    }
    /* $resResp = */
    mysql_query($sql);


    //echo $url;
    print "op e " . $_POST["vaiprafrente"] . "<br>";
    $op = $_POST['vaiprafrente'];
    if ($op == 'a') {
        if ($q > 1) {
            $pag = $q - 1;
        }
    } else {
        if ($q < 29) {
            $pag = $q + 1;
        }
        else{
            header("Location: index.php?r=tabela");
        }
        //echo $sql;
    }
    $url = "Location: index.php?r=form&q=" . $pag;
    header($url);
}
?>