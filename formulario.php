<?php error_reporting(0); ?>
<?php include("sessao.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="padrao.css">
        <script src="javascript.js"></script>
    </head>
    <body>

        <div class="geral">
            <div class="cabecalho">
                <?php include("cabecalho.php"); ?>
            </div>
            <div class="menu">
                <?php include("menu.php"); ?>
            </div>
            <div class="login">
                <?php
                session_start();
                //print $campoUser["nome"];
                if ($_SESSION["AUTH"] == true) {
                    echo $_SESSION["usuario"] . " ";
                    //echo time() - $_SESSION['TIME'];
                    echo " ," . " " . "<a href = " . "logout.php" . " >SAIR</a>";
                }
                if (time() - $_SESSION['TIME'] > 1800) {
                    session_destroy();
                    session_unset();
                }
                ?>

            </div>
            <div class="conteudo">
                <div class="breadcrumbs-form">
                    <a href="index.php">Início</a> >> <span>Formulário</span>
                </div>
                <div class="conteudo-form">
                    
                    <?php
                    include("connection.php");
                    $q = $_GET['q'];

                    /* Recupera a questao */
                    if (($q == NULL) || ($q < 1))
                        header("location: formulario.php?q=1");
                    else if(($q > 28))
                        header("location: index.php?r=tabela");

                    // define as strings de consulta SQL
                    $sql = "SELECT * FROM questoes where id = " . $q; 
                    $num_question = "SELECT count(*) FROM questoes";

                    // executa as consultas e armazena o resultado nas variaveis
                    $res = mysql_query($sql);
                    $resMAX = mysql_query($num_question);

                    $MAX = mysql_fetch_array($resMAX); // quantidade total de questoes
                    $cont = 0;

                    while ($row = mysql_fetch_array($res)) {
                        
                        
                        //$cont = $cont + 1;
                        
                        echo "cont: " . $cont;
                        
                        /*echo "<div class = \"question-form\"><p>Questão " .
                        $q . " de " . $MAX[0] . "</p></div>";*/

                        // Para separar as questoes relacionadas com sustentabilidade das questoes de fatores de sucesso para o negócio
                        if ($q < 9){
                            echo "<div class = \"question-form\"><p>1ª Parte: Fatores de Sucesso para o negócio</p></div><hr />";
                            echo "<div class = \"question-form\"><p>Questão " . $q . " de 8 </p></div>";
                        }else if($q < 14){
                            echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Natureza do Produto</p></div><hr />";
                            echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
                        }else if($q < 19){
                            echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Atratividade/Funcionalidade</p></div><hr />";
                            echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
                        }else if($q < 24){
                            echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Governança</p></div><hr />";
                            echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
                        }else{
                            echo "<div class = \"question-form\"><p>2ª Parte: Aspectos de Sustentabilidade - Alinhamento às causas de sustentabilidade</p></div><hr />";
                            echo "<div class = \"question-form\"><p>Questão " . ($q - 8) . " de 20 </p></div>";
                        }

                        echo  $row['id'] . " " . $row['questao'] . "<br>" . "<p>";

                        /* Abre o formulario */
                        echo "<form id = \"form2\" action=\"atualiza_pagina.php\" method=\"POST\">";
                        
                        /* Recupera as possiveis respostas */
                        $sql = "SELECT * FROM tipo_resposta WHERE tipo = " . $row['tipo'];
                        $resresp = mysql_query($sql);
                        while ($rowresp = mysql_fetch_array($resresp)) {
                            echo "<input class = radio type=\"radio\" name=\"" . $row['id'] . "\" value=\"" . $rowresp['resp'] . "\"";
                            echo "/>" . $rowresp['rotulo'] . "<br />";
                            echo "<input type=hidden name=\"q\" value=" . $q . " />";
                            echo "<input type=hidden name=\"op\" id=\"vaiprafrente\" value=" . $q . " />";
                        }
                    }
                    ?>
                    <p>
                        <label>Se quiser justifique abaixo a sua resposta:</label><br>
                        <textarea name="just"  id="mensagem" cols="60" rows="8" maxlength="700"></textarea>
                    </p>
                    <table>
                        <tr>
                            <td>
                                <?php if ($q > 1) { ?>
                                    <input class ="button" name="back" type="button" value="<< Anterior" onclick="mudaPagina('a');"/>
                                <?php } ?>
                            </td>
                            <td class="button"> </td>
                            <td>
                                <?php $botao = ""; if ($q != $MAX[0]){$botao = "Proximo >>";} else {$botao = "Finaliza";}?>
                            <input class = "button_prox" name = "next" type = "button" value = "<?php echo $botao;?>" onclick="mudaPagina('p');"/>
                            </td>
                        </tr>
                    </table>
                </form> <!-- fecha o form que foi aberto no codigo php -->

                </div>
            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div>
    </body>
</html>
