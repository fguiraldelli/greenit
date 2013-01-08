<?php session_start(); ?>

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
    
    <li <?php if ($_GET['r'] == 'login') echo "class=\"active\"" ?> >
        <?php if ($_SESSION["AUTH"] == false) {
            echo '<a href="index.php?r=login">Login</a>';} ?> 
    </li>
    
    <li <?php if ($_GET['r'] == 'tabela') echo "class=\"active\"" ?> >
        <?php if ($_SESSION["AUTH"] == true) {
            echo '<a href="index.php?r=tabela">Matriz</a>' ;} ?>
    </li>
    
    <li <?php if ($_GET['r'] == 'cadastro') echo "class=\"active\"" ?> >
        <?php if ($_SESSION["AUTH"] == false) {
            echo '<a href="index.php?r=cadastro">Cadastro</a>'; } ?>
    </li>
           
    <li <?php if ($_GET['r'] == 'form') echo "class=\"active\"" ?> >
        <?php if ($_SESSION["AUTH"] == true) {
            echo '<a href="index.php?r=form">Formulario</a>';} ?>
    </li>
</ul>
