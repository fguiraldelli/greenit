<div class="breadcrumbs">
    <a href="index.php">Início</a> >> <span>Matriz</span>
</div>
<?php
include ("sessao.php");
include("connection.php");
$idp = $_SESSION["idp"];
$data = date("Y-m-d");
$sql = "SELECT * FROM matriz";
$sql2 = "SELECT * FROM respostas WHERE idp = " . $idp /* . " AND data = '" . $data . "'" */;
$result_user = mysql_query($sql2);
$data_user = mysql_fetch_array($result_user);
$result = mysql_query($sql);
echo "<table class ='resultado'>";

// cria 2 colunas vazias
echo '<tr><th style="border-left-color:white; border-top-color:white; border-right-color:white; "></th>';
echo '<th style="border-left-color:white; border-top-color:white; "></th>';

echo '<th style="border-color:black" colspan="8"> Fatores de Sucesso para o negócio </th></tr>';
echo "<tr><th colspan='2'> Aspectos de Sustentabilidade</th>";
$linhas = mysql_num_rows($result);
/* for ($k = 0; $k < $linhas; $k++) {
  print "user" . mysql_result($result_user, $k, 0) . "<br>";
  print "questao" . mysql_result($result_user, $k, 1) . "<br>";
  print "resp" . mysql_result($result_user, $k, 2) . "<br>";
  } */
$i = 0;
/* Imprime as perguntas da coluna */
while ($i < 8) {
    echo "<td class=s0>" . mysql_result($result, $i, 1) . "</td>";
    $i++;
}
echo "</tr>";

/* Imprime as perguntas da linha e colore a célula da tabela */
while ($i < $linhas) {

    // Para imprimir os cabeçalhos das linhas mescladas
    if ($i == 8)
        echo '<th rowspan="6"> Natureza do Produto </th>';
    if ($i == 13)
        echo '<th rowspan="6"> Atratividade/ Funcionalidade </th>';
    if ($i == 18)
        echo '<th rowspan="6"> Governança </th>';
    if ($i == 23)
        echo '<th rowspan="6"> Alinhamento às causas da sustentabilidade </th>';


    echo "<tr><td class='s0'>" . mysql_result($result, $i, 1) . "</td>";

    // Imprime as linhas com as cores
    for ($j = 0; $j < 8; $j++) {
        //Recupera os comentarios da matriz
        $neg = $j + 1;
        $sust = $i + 1;
        $sql = "SELECT * FROM comentario WHERE idp=" . $idp .
                " AND idqs=" . $sust . " AND idqn=" . $neg;
        $res = mysql_query($sql);
        $row = mysql_fetch_array($res);
        $coment = $row['comentario'];

        print "<td class = s" . mysql_result($result_user, $i, 2) .
                mysql_result($result_user, $j, 2) . "> 
                    <span> <strong> Aspecto do Negócio:</strong><br /> " . mysql_result($result_user, $j, 3) . " <br /><br />
                            <strong> Aspecto de sustentabilidade:</strong><br /> " . mysql_result($result_user, $i, 3) .
                "<br /><br /><strong> Comentário:</strong><br /><textarea id=" . $i . "c" . $j .
                " rows=3; cols=20;>" . $coment . "</textarea>" .
                "<input type=\"button\" value=\"Salvar\" 
                                onclick=\"salvaComentario(" . $idp .
                "," . $j . "," . $i . ",'" . $i . "c" . $j . "');\" \>" .
                "</span> </td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";
?>
<div>
    <p style="text-align: center; font-size: 14px; font-weight: bold;">Legenda</p>

    <table class ="resultado">
        <tr class="legenda">
            <td class="legenda">Alta correlação <strong>NEGATIVA</strong> com sustentabilidade</td>
            <td class ="s-12"></td>
            <td class ="s-11"></td>
            <td class ="s-10"></td>
            <td class ="s00"></td>
            <td class ="s11"></td>
            <td class ="s21"></td>
            <td class ="s22"></td>
            <td class="legenda">Alta correlação <strong>POSITIVA</strong> com sustentabilidade</td>
        </tr>
    </table>
</div>
