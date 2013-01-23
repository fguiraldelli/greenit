
<?php
include ("sessao.php");
include("connection.php");
?>

<div class="conteudo">
    <div class="breadcrumbs">
        <a href="index.php">Início</a> >> <span>Projeto</span>
    </div>

    <div class="col-esquerda2">

        <p class="titulo"> Opções </p>
        <br />
        <a href="#" class="medium-button"> Adicionar Novo Projeto </a>
        
        
        
    </div>
    <div class="col-meio">
        <p class="titulo"> Histórico de Projetos</p>
        <p class="texto"  onmouseover="showDiv('dadosProj');">
            <a href="#"  onmouseover="dados-proj.style.display=''"> Projeto ABCD </a>
        </p>
        <p class="texto">
            <a href="#"> Projeto XPTO </a>
        </p>
        <p class="texto">
            <a href="#"> Projeto OO </a>
        </p>
        <br /><br />
    </div>
    
    <div class="col-direita2" id="dados-proj" style="display:none">
        <p class="titulo"> Histórico de Projetos</p>
        <p class="texto">
            <a href="#"> Projeto ABCD </a>
        </p>
        <p class="texto">
            <a href="#"> Projeto XPTO </a>
        </p>
        <p class="texto">
            <a href="#"> Projeto OO </a>
        </p>
        <br /><br />
    </div>
</div>
