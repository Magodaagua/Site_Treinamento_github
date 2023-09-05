  <!-- Conexão com o banco de dados -->
  <?php
		//error_reporting(0);
		//ini_set("display_errors", 0);
		//$link = mysqli_connect('localhost', 'root', '', 'testes');
		//$db = mysqli_select_db($link, 'testes');
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$dbname = "testes";
		
		//Criar a conexão
		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	?>
	<!-- Início da sessão e confirmação de que o usuário está logado -->
	<?php
		session_start();
		$email = $_SESSION['email'];
		if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
			header("Location: ./login.html");
			exit;
		}
	?>