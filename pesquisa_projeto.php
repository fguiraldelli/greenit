
<?php
include ("sessao.php");
include("connection.php");
$idu = $_SESSION["idu"];
if($_SESSION["busca_proj"]== ""){
    $_SESSION["busca_proj"] = (isset($_GET['b'])) ? $_GET['b'] : "";
}
$pagina = (isset($_GET['pag'])) ? $_GET['pag'] : 0;
?>

<div class="conteudo">
    <div class="breadcrumbs">
        <a href="index.php">Início</a> >> <span>Projeto</span>
    </div>

    <div class="col-esquerda2">

        <p class="titulo"> Opções </p>
        <br />
        <a href="index.php?r=projeto" class="medium-button">
            Voltar</a>
        <br />
        <a href="index.php?r=pesquisa_projeto" class="medium-button">
            Pesquisar Projetos </a>
        <br />
        <a href="index.php?r=pesquisa_tecnologia" class="medium-button">
            Pesquisar Tecnologia </a>





    </div>
    <div class="col-direita2">
        <?php
        echo "<form id = \"formbusca\" action=\"atualiza_busca_projeto.php\" method=\"POST\">";
        echo "<label class=\"cadastro\">Nome do projeto que deseja buscar:</label><br>
            ";
        echo "<input name=\"busca_proj\" type=\"text\" id=\"nome\" size=\"70\" maxlength=\"60\"/>";
        echo "<br /><br />";
        echo "<p><input name=\"buscar\" type=\"submit\" id=\"buscar\" value=\"Buscar\" /><br><br></p>";
        echo "</form>";

        $sql = "select * from projeto where idu = " . $idu;
        echo "<form id = \"form3\" action=\"atualiza_projeto.php\" method=\"POST\">";
        echo "<input type=hidden name=\"nome-proj\" id=\"nome-proj\" />";
        echo "<input type=hidden name=\"tipo\" id=\"tipo\" />";
        echo "<input type=hidden name=projeto id=projeto />";


        /* Altera os espaços adicionando no lugar o simbolo % */
        //echo $_SESSION["busca_proj"];
        if ($_SESSION["busca_proj"] != '') {

            $qr = "SELECT * FROM `projeto` WHERE titulo LIKE '%" . 
                    $_SESSION["busca_proj"] . "%' AND (idu=" . $idu .
                    " OR (idu <> " . $idu . " AND confidencial=0)) ORDER BY titulo";
            
            // Executa a query no Banco de Dados
            $sql = mysql_query($qr);

            // Conta o total ded resultados encontrados
            $total = mysql_num_rows($sql);

            echo "Sua busca por: ";
            echo $_SESSION["busca_proj"];
            echo " retornou '$total' resultados.";
        }
        
        /* Inicio Paginação */

            $total_reg = "10"; // número de registros por página
 
            //Se a página não for especificada a variável "pagina" tomará o 
            //valor 1, isso evita de exibir a página 0 de início:

            if (!$pagina) {
                $pc = "1";
            } else {
                $pc = $pagina;
            }

            //Vamos determinar o valor inicial das buscas limitadas:

            $inicio = $pc - 1;
            $inicio = $inicio * $total_reg;

            //Vamos selecionar os dados e exibir a paginação:

            $limite = mysql_query("$qr LIMIT $inicio,$total_reg");
            $todos = mysql_query("$qr");

            $tr = mysql_num_rows($todos); // verifica o número total de registros
            //print "tr: ".$tr."<br>";
            $tp = $tr / $total_reg; // verifica o número total de páginas
            //print "tp: ".$tp."<br>";
            // vamos criar a visualizaçã
        ?>
        
        <table class="projeto">
            <?php
            while ($row = mysql_fetch_array($limite)) {
                echo "<tr>";
                echo "<td class=\"proj\">" . $row['titulo'] . "</td> ";
                echo "<td class=\"button\"><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 2);\"
                    class=\"small-button\"> Detalhes do projeto </a></td>";
                echo "<td class=\"button\"><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 0);\"
                    class=\"small-button\"> Ver Matriz </a></td>";
                echo "<td><a href\"#\" 
                    onclick=\"loadMatrix('" . $row['idp'] . "','" . $row['titulo'] . "', 1);\"
                    class=\"small-button\">
                    Editar Avaliação </a></td>";
                echo "</tr>";
            }
            $b = $_SESSION["busca_proj"];
            $_SESSION["busca_proj"] = '';
            ?>
        </table>
        <br /><br />
        <?php
        // agora vamos criar os botões "Anterior e próximo"
            $anterior = $pc - 1;
            $proximo = $pc + 1;
            if ($pc > 1) {
                echo " <a id=\"b_ant\" class=\"small-button\" href='index.php?r=pesquisa_projeto&b=".$b."&pag="
                .$anterior."'><- Anterior</a> ";
            }
            echo " ";
            if ($pc < $tp) {
                echo " <a id=\"b_prox\" class=\"small-button\" href='index.php?r=pesquisa_projeto&b=".$b."&pag="
                .$proximo."'>Próxima -></a>";
            } ?>
    </div>
</div>
