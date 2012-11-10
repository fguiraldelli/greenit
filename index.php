<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="padrao.css">
    </head>
    <body>
        <div class="geral">
            <div class="cabecalho">
                <?php include("cabecalho.php"); ?>
            </div>
            <div class="menu">
                <?php include("menu.php"); ?>
            </div>
            <div class="conteudo">
                <?php
                    switch ($_GET['r']){
                        case "inicio":
                            include("inicio.php");
                            break;
                        case "sobre":
                            include ("sobre.php");
                            break;
                        case "tabela":
                            include ("tabela.php");
                            break;
                        default : header ("Location: index.php?r=inicio");
                    }
                ?>
            </div>
            <div class="rodape">
                <?php include("rodape.php"); ?>
            </div>
        </div
    </body>
</html>
