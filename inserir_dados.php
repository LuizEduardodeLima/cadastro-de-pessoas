<?php

	date_default_timezone_set('America/Sao_Paulo');

	$pdo = new PDO('mysql:host=localhost;dbname=sistema_cad', 'root', '');

	$_POST['dados_pessoa'];

	$nome = $_POST['nome-bd'];
		
	$endereco = $_POST['endereco-bd'];
		
	$numero = $_POST['numero-bd'];

	$complemento = $_POST['complemento-bd'];

	$cidade = $_POST['cidade-bd'];

	$bairro = $_POST['bairro-bd'];

	$estado = $_POST['estado-bd'];

	$cpf = $_POST['cpf-bd']; 

	$rg = $_POST['rg-bd'];

	$email = $_POST['email-bd'];

	$telefone = $_POST['telefone-bd'];

	//Inserindo no banco de dados:
	$sql = $pdo->prepare("INSERT INTO `pessoa` VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	//Executando o comando que criamos acima:
	$sql->execute(array($nome, $endereco, $numero, $complemento, $cidade, $bairro, $estado, $cpf, $rg, $email, $telefone));

	header('Location: cadastro.html');
?>
