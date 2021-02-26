<?php  
	//Conectando BD:
	$pdo = new PDO('mysql:host=localhost;dbname=login', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	/*Dentro da conexão temos que adicionar array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") para que a nossa codificação utf-8 volte de forma correta, sem ele, os caracteres especiais voltam em formato de interrogação*/
	$_POST['entrar'];
	
	//Salvando dados dentro das duas variaveis:
	$email = $_POST['email'];
	$senha = $_POST['senha'];


	//Verificando se o usuário é cadastrado:
	$sql = $pdo->prepare("SELECT * FROM `cadastrado` WHERE `email` LIKE ? AND `senha` LIKE ? ");
	
	//Lembrando que o mais indicado para evitar sql injection é passar os valores diretamente dentro de uma array e dentro do execute();
	$sql->execute(array($email, $senha));

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);
	//O parâmetro PDO::FETCH_ASSOC dá uma especie de encurtada no retorno do que vem do DB, retorna apenas as colunas e retira os indexs:

	$logado = count($info);

	if ($logado) {
		header('Location: cadastro.html');
	}else{
		header('Location: index.html');
	}

?>