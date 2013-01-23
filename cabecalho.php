<?php
error_reporting(0);
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="padrao.css">
        <script src="javascript.js"></script>
    </head>
    <body>

        <div class="geral">
            <div class="cabecalho">
                <div class="logo">
                    <img src="imgs/logo2.png" />
                </div>
                <div class="titulo">
                    <p class="titulo"> Green IT Consultoria</p>
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li  <?php if ($_GET['r'] == 'inicio') echo "class=\"active\"" ?> >
                        <a href="index.php?r=inicio">Início</a>
                    </li>

                    <li <?php if ($_GET['r'] == 'sobre') echo "class=\"active\"" ?> >
                        <a href="index.php?r=sobre">Sobre</a>
                    </li>

                    <li <?php if ($_GET['r'] == 'contato') echo "class=\"active\"" ?> >
                        <a href="index.php?r=contato">Contato</a>
                    </li>      
                    
                    <li <?php if ($_GET['r'] == 'form') echo "class=\"active\"" ?> >
                        <?php
                        if ($_SESSION["AUTH"] == true) {
                            echo '<a href="index.php?r=form">Projetos</a>';
                        }
                        ?>
                    </li>
                   <!-- <li <?/*php if ($_GET['r'] == 'tabela') echo "class=\"active\"" ?> >
                        <?php
                        if ($_SESSION["AUTH"] == true) {
                            echo '<a href="index.php?r=tabela">Matriz</a>';
                        }
                        */?>
                    </li>
                   
                    <li <?/*php if ($_GET['r'] == 'form') echo "class=\"active\"" ?> >
                        <?php
                        if ($_SESSION["AUTH"] == true) {
                            echo '<a href="index.php?r=form">Formulario</a>';
                        }
                        */?>
                    </li> -->
                </ul>
            </div>
            <div class="login">
                <?php
                //session_start();
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
