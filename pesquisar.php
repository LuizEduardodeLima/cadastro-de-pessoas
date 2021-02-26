<?php  
	//Conectando BD:
	$pdo = new PDO('mysql:host=localhost;dbname=sistema_cad', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	/*Dentro da conexão temos que adicionar array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") para que a nossa codificação utf-8 volte de forma correta, sem ele, os caracteres especiais voltam em formato de interrogação*/
	$_POST['buscar'];

	$opcao = $_POST['escolha'];

	$pesquisar = $_POST['pesquisa'];
	
	if($opcao == 'cpf'){

		$sql = $pdo->prepare("SELECT * FROM `pessoa` WHERE `cpf` LIKE ? ");
		
	}
	
	if ($opcao == 'rg') {
		
		$sql = $pdo->prepare("SELECT * FROM `pessoa` WHERE `rg` LIKE ? ");
	}

	if ($opcao == 'nome') {

		$sql = $pdo->prepare("SELECT * FROM `pessoa` WHERE `nome` LIKE ? ");
	}
	
	//Lembrando que o mais indicado para evitar sql injection é passar os valores diretamente dentro de uma array e dentro do execute();
	$sql->execute(array($pesquisar));

	$info = $sql->fetchAll(PDO::FETCH_ASSOC);
	//O parâmetro PDO::FETCH_ASSOC dá uma especie de encurtada no retorno do que vem do DB, retorna apenas as colunas e retira os indexs:

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro - Entre com os dados abaixo</title>

	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/pesquisar.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
</head>
<body>
	<div id="container">
		
		<h1 id="titulo">Sistema Cad</h1>

		<button id="cadastrar"><a href="pesquisar.html">PESQUISAR NOVAMENTE</a></button>

			<div id="grade">

				<h3 id="titulo-1">Resultado da Pesquisa</h3>

				<div id="titulo-1"> 
					<?php
						echo 'Nome: '.$info[0]['nome'].'<br>';
						echo 'Rua: '.$info[0]['rua'].', N°: '.$info[0]['numero'].'<br>';
						echo 'Complemento: '.$info[0]['complemento'].'<br>';

						echo "Cidade: ".$info[0]['cidade']. ', Bairro: '.$info[0]['bairro'].'<br>';
						echo 'Estado: '.$info[0]['estado'].'<br>';
						echo 'Cpf: '.$info[0]['cpf'].'<br>';
						echo 'Rg: '.$info[0]['rg'].'<br>';
						echo 'E-mail: '.$info[0]['email'].'<br>';
						echo 'Telefone: '.$info[0]['telefone'];
					?>
				</div>
			</div>
	</div>

	<!--Chamando o arquivo jquery-->
	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript">
		
		var data = new Date();

		var dia = data.getDate();
		var mes = data.getMonth();
		var ano4 = data.getFullYear();

		var formatando_data = dia + '/' + (mes + 1) + '/' + ano4;

		var elemento = $('#titulo');

		elemento.html('<h3>' + 'Sistema Cad - ' + formatando_data + '</h3>');
		
	</script>
</body>
</html>