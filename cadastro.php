<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro </title>
</head>
<body>
<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO 
//PARA DECLARAR UMA VARIAVEL EM PHP BASTA UTILIZAR O SINAL $ 
//A FUNÇÃO $_POSTÉ METODO UTILIZADO PARA QUE A VARIAVEL RECEBA O //CONTEÚDO DOS CAMPOS DO FORMULÁRIO
//ENTRE COLCHETES ESTÁ O NOME DOS CAMPOS ESPECIFICADOS NO //FORMULÁRIO
$nome= $_POST["nome"];
$empresa= $_POST["empresa"];
$email= $_POST["email"];
$senha= md5($_POST["senha"]);


$conexao = mysql_connect("localhost","root"); //essa linha irá fazer a conexão com o banco de dados.
if (!$conexao)
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());//aqui irei testar se houve falha de conexão

//conectando com a tabela do banco de dados
$banco = mysql_select_db("clientes",$conexao); //nome da tabela onde os dados serão armazenados

//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
$query = "INSERT INTO `clientes` ( `nome` , `empresa` , `email` , `senha`) 
VALUES ('$nome', '$empresa', '$email', '$senha', '')";
mysql_query($query,$conexao);

//$query = nome da variável que utilizarei para realizar a operação de inserção dos dados
//clientes = nome da tabela que será salvo os dados do cadastro do cliente
//nome, email, sexo, ddd, telefone, endereço, cidade, estado, bairro, país, login, senha, news, id. São apenas os nomes dos campos que constam na tabela clientes.

//VALUES = indica que serão inseridos os seguintes valores.
//$nome, $email, $sexo, $ddd, $telefone, $endereço, $cidade, $estado, $bairro, $país, //$login, $senha, $news, $id.
//São apenas as variaveis a qual eu atribui os valores digitados no formulário.

echo "Seu cadastro foi realizado com sucesso!Agradecemos a atenção.";
//mensagem que é escrita quando os dados são inseridos normalmente.
?> 
</body>
</html>