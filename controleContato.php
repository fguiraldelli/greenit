<?php

 $nome=$_POST[nome];//aqui pega os dados que foram preenchidos la no formulário com o ID NOME
 $email=$_POST[email];//aqui a mesma coisa, mas com o email
 $assunto=$_POST[assunto];//aqui a mesma coisa, mas com o assunto
 $mensagem=$_POST[mensagem];//aqui a mesma coisa, mas com a mensagem

 //agora vamos enviar todos esses dados usando a função mail que é do PHP
 mail("admin@greenitconsultoria.com","$assunto","
 Nome: $nome
 Email: $email
 Assunto: $assunto
 Mensagem: $mensagem","FROM:$nome<$email>");

 header("Location: $sucesso sucesso.php");
	//echo "sua mensagem foi enviada com sucesso!"; //aí mostramos no navegador da pessoa que enviou o email uma mensagem de sucesso

?>

