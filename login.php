<?php 
	session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 0);

	$con = mysqli_connect('localhost', 'root', '', 'testes') or die("Não foi possível realizar a conexão");
	mysqli_select_db($con, "testes");
	$resultado = mysqli_query($con, "SELECT * FROM usuario where email='".$_REQUEST["login_Email"]."' AND senha='".$_REQUEST["login_Senha"]."'");
	$row = mysqli_fetch_array($resultado);		
		
	if (!$row) {
		echo "<script>alert('Usuário ou senha errado');location.href=\"login.html\"</script>";
	}else{
		session_start();
		$_SESSION['email'] = $_REQUEST["login_Email"];
		$_SESSION['senha'] = $_REQUEST["login_Senha"];
		$_SESSION['ID_usuario'] = $row['ID_usuario'];
		$_SESSION['Nome'] = $row['Nome'];
		$_SESSION['Cargo'] = $row['Cargo'];
		$_SESSION['RG'] = $row['RG'];
		$_SESSION['CPF'] = $row['CPF'];
		header( "Location: menu.php");
	}
	mysqli_free_result($resultado);
	$fechou = mysqli_close($con);
?>

