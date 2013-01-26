<?php include("cabecalho.php");?>
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
                case "sucesso":
                    include("sucesso.php");
                    break;
                case "projeto":
                    include("projeto.php");
                    break;
                case "busca":
                    include("busca.php");
                    break;
				case "resbusca":
					include("resultadobusca.php");
					break;
                default : include("inicio.php");
            }
            ?>
        </div>
<?php include("rodape.php");?>
