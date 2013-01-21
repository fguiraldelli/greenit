<br />

<?php if ($_SESSION["AUTH"] == false) { ?>

    <div class="col-esquerda">
        <p class="titulo"> Login </p>
        <span>Se você já possui um cadastro, informe seu nome de usuário e senha para acessar o sistema</span><br /><br />
        <form method="post" action="index.php?r=validaLogin">
            <label class="cadastro">Usuário (email) <span class="style1">*</span></label><br>
            <input type="text" name="usuario" size=30 /><br><br />
            <label class="cadastro">Senha <span class="style1">*</span></label><br>
            <input type="password" name="senha" size=12 /><br /><br />
            <input type="hidden" name="abriuForm" value=1 />
            <input type="submit" value="Fazer login" /><br>
            <span class="style1"><br />* Campos com * são obrigatórios!</span>
        </form>

    </div>
    <div class="col-direita">
        <p class="titulo"> Cadastre-se </p>
        <span>Se você ainda possui um cadastro, informe os seus dados abaixo e clique em cadastrar para fazer um cadastro gratuito.</span><br /><br />
        <form  name="cadastro" method="post" action="index.php?r=concad">
              <!--<td class="cadastro">Nome:</td>-->
            <label class="cadastro">Nome (não use acentos) <span class="style1">*</span></label><br>
            <input name="nome" type="text" id="nome" size="70" maxlength="60" onkeyup="validaNome(this.id,this.value)"/>
            <br /><br />
            <label class="cadastro">Empresa <span class="style1">*</span></label><br>
            <input name="empresa" type="text" id="empresa" size="70" maxlength="60" onkeyup="validaEmpresa(this.id,this.value)"/>
            <br /><br />
            <label class="cadastro">Email <span class="style1">*</span></label><br>
            <input name="email" type="text" id="email" size="70" maxlength="60" onkeyup="validaEmail(this.id,this.value)"/>
            <br /><br />
            <label class="cadastro">Senha <span class="style1">*</span></label><br>
            <input name="senha" type="password" id="senha" maxlength="12" onkeyup="validaSenha(this.id,this.value)"/>
            <span class="style1"> Digite uma senha de 7 a 12 caracteres</span>
            <br /><br />
            <label class="cadastro">Repita a Senha <span class="style1">*</span></label><br>
            <input name="repsenha" type="password" id="repsenha" maxlength="12" onkeyup="matchSenha(this.id,this.value)"/>
            <br />
            <p>
                <input name="cadastrar" type="submit" id="cadastrar" value="Cadastrar" onclick="return validaForm();" />
                <input name="limpar" type="reset" id="limpar" value="Limpar" />
                <span class="style1"><br>* Campos com * são obrigatórios!<br> Campos em vermelho precisam ser revisados</span>
            </p>
        </form>

    </div>


<?php } else { ?>    
    
    <div class="col-esquerda">
        
        <p class="titulo"> Avaliação </p>
        
        <p class="texto"> 
            Para avaliar um projeto você terá que preencher um questionário dividido em duas partes: 
            Fatores de Sucesso para o Negócio e Aspectos voltados para a Sustentabilidade.
            Entretanto, antes de responder às perguntas é necessário que você informe o nome do projeto a ser avaliado
            e faça uma pequena descrição desse projeto, além de incluir e descrever quais foram as tecnologias 
            utilizadas neste projeto.
        </p>
      <!--  <p class="texto">
            O questionário tem um total de 28 perguntas. As perguntas relativas aos Fatores de Sucesso para o Negócio
            se referem a fatos que podem ter acontecido na sua empresa com a implantação do projeto em questão. As questões
            voltadas a Aspectos de Sustentabilidade têm o objetivo de avaliar se a solução/projeto adotado tem uma correlação
            positiva ou negativa com a sustentabilidade.
        </p> -->
        <p class="texto">
            Depois de preenchido o questionário, uma matriz de avaliação de impactos será apresentada. 
            Nesta matriz, você poderá ver a relação entre os Fatores de Sucesso para o Negócio e os Aspectos de Sustentabilidade.
            Além disso, caso deseje, você poderá adicionar comentários em cada célula da matriz, o que, posteriormente,
            poderá auxiliá-lo a tomar decisões sobre o projeto.
        </p>
        <br /><br />
        <a href="#" class="big-button"> Avalie seu Projeto </a>
    </div>
    <div class="col-direita">
        <p class="titulo"> Pesquisa de Mercado </p>
        <p class="texto">
            Bla bla bla... Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
        </p>
        <p class="texto">
            Bla bla bla... Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
            Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...Bla bla bla...
        </p>
        <br /><br />
        <a href="#" class="big-button"> Pesquisa de Mercado </a>
    </div>

<?php } ?>


