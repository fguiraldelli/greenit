<?php
if ($q > 0)
    include("cabecalho.php");
?>

<?php
$q = (isset($_GET['q'])) ? $_GET['q'] : 0;
if ($q > 0) {
    echo "<div class=\"breadcrumbs-form\">";
    echo "<a href=\"index.php\">Início</a> >> <span>Avaliação</span>";
    echo "</div>";
}
?>
<div class="conteudo-form">

    <?php
    include("connection.php");

    /* Recupera a questao */
    if (!isset($q) || ($q < 0))
        header("location: formulario.php?q=0");
    else if (($q > 28))
        header("location: index.php?r=tabela");
    $idu = $_SESSION["idu"];
    //print "idu: ".$idu.'<br>';
    $idp = $_SESSION["idp"];
    //print "idu: ".$idp.'<br>';
    $sql = "SELECT * FROM respostas where idp=" . $idp . " AND 
                        idq = " . $q;
    $caresp = mysql_query($sql);
    $resp = mysql_fetch_array($caresp);
    //print "resp[1]: ".$resp[1].'<br>';
    //print "resp[2]: ".$resp[2].'<br>';
    //print "resp[3]: ".$resp[3].'<br>';
    // define as strings de consulta SQL
    $sql = "SELECT * FROM questoes where id = " . $q;
    $num_question = "SELECT count(*) FROM questoes";

    // executa as consultas e armazena o resultado nas variaveis
    $res = mysql_query($sql);
    $resMAX = mysql_query($num_question);

    $MAX = mysql_fetch_array($resMAX); // quantidade total de questoes
    $cont = 0;



    if ($q == 0) {
        include("novoProjeto.php");
    } else {

        while ($row = mysql_fetch_array($res)) {


            //$cont = $cont + 1;
            //echo "cont: " . $cont;

            /* echo "<div class = \"question-form\"><p>Questão " .
              $q . " de " . $MAX[0] . "</p></div>"; */

            // Mostra qual projeto esta sendo analizado
            echo "<div class =\"question-form\"><h1>" . $_SESSION['titulopj'] . "</h1></div>";

            // Para separar as questoes relacionadas com sustentabilidade das questoes de fatores de sucesso para o negócio
            if ($q < 9) {
                echo "<div class = \"question-form\"><p>1ª Parte: Fatores de Sucesso para o negócio</p></div><hr />";
                echo "<div class = \"question-form\"><p>Questão " . $q . " de 8 </p></div>";
            } else if ($q < 14) {
                echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Natureza do Produto</p></div><hr />";
                echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
            } else if ($q < 19) {
                echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Atratividade/Funcionalidade</p></div><hr />";
                echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
            } else if ($q < 24) {
                echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Governança</p></div><hr />";
                echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
            } else {
                echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Alinhamento às causas de sustentabilidade</p></div><hr />";
                echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
            }
            echo "<div class=pergunta>";
            echo /* $row['id'] . " " . */ $row['questao'] . "<br>" . "<p>";
            echo "</div>";
            echo "<div class=radio>";
            /* Abre o formulario */
            echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";

            print $rowresp['resp'];

            /* Recupera asQuestão possiveis respostas */
            $sql = "SELECT * FROM tipo_resposta WHERE tipo = " . $row['tipo'];

            $resresp = mysql_query($sql);
            echo "<input type=hidden name=\"vaiprafrente\" id=\"vaiprafrente\" />";
            $radio = $row['id'];
            //print "radio nome= ".$radio;
            while ($rowresp = mysql_fetch_array($resresp)) {
                echo "<input class = radio type=\"radio\" id=\"resp_radio\" name=\"" . $row['id'] . "\" value=\"" . $rowresp['resp'] . "\"";
                //echo "<input class = radio type=\"radio\" name=\"" . $row['id'] . "\" value=\"" . $rowresp['resp'] . "\"";
                //print "resp[2]: ".$resp[2]."<br>";
                //print "rowresp['resp']: ".$rowresp['resp']."<br>";
                if ($resp[2] == $rowresp['resp']) {
                    echo 'checked';
                }
                echo "/>" . $rowresp['rotulo'] . "<br />";
                echo "<input type=hidden name=\"q\" value=" . $q . " />";
            }
        }
        ?>
    </div>
<div class="justificativa">
        <p>
            <label>Se quiser justifique abaixo a sua resposta:</label><br>
            <textarea name="just"  id="mensagem" cols="60" rows="8" maxlength="700"><?php echo $resp[3]; ?></textarea>
        </p>
    <?php } //fim if   ?>

    <table>
        <tr>
            <td>
                <?php
                if ($q > 1) {
                    echo '<input class="button" name="back" type="button" value="<< Anterior" onclick="mudaPagina(\'a\',\'' . $radio . '\');">';
                }
                ?>
            </td>
            <td class="button"></td>
            <td>
                <?php
                $botao = "";
                if ($q == 0) {
                    $botao = "Iniciar questionario";
                } else if ($q != $MAX[0]) {
                    $botao = "Proximo >>";
                } else {
                    $botao = "Finaliza";
                }
                ?>
                <?php
                $js_onclick = "";
                if (strcmp($botao, "Finaliza") == 0) {
                    $js_onclick = "finaliza('p','" . $radio . "');";
                } else if (strcmp($botao, "Iniciar ques<div class = \"question-form\">tionario") == 0) {
                    $js_onclick = "iniciaQuest();";
                } else {
                    $js_onclick = "mudaPagina('p','" . $radio . "');";
                }
                if($q != 0){
                ?>
                <input class = "button_prox" name = "next" type = "button" 
                       value = "<?php echo $botao; ?>" onclick="<?php echo $js_onclick; ?>"/>
                <?php } ?>
            </td>
        </tr>
    </table>
</form> <!-- fecha o form que foi aberto no codigo php -->
</div> 
