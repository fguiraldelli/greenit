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
                <?php
                switch ($_GET['r']) {
                    case "inicio":
                        include("inicio.php");
                        break;
                    case "sobre":
                        include ("sobre.php");
                        break;
                    case "tabela":
                        include ("tabela.php");
                        break;
                    case "cadastro":
                        include ("cadastro.php");
                        break;
                    case "concad":
                        include ("controleCadastro.php");
                        break;
                    case "login":
                        include("login.php");
                        break;
                    case "validaLogin":
                        include("validaLogin.php");
                        break;
                    case "form":
                        include("formulario.php");
                        break;
                    case "contato":
                        include("contato.php");
                        break;
                    default : header("Location: index.php?r=inicio");
                }
                ?>
            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div
    </body>
</html>
