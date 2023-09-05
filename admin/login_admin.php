<?php 
	session_start();
	error_reporting(E_ALL);
	ini_set("display_errors", 0);

	$con = mysqli_connect('localhost', 'root', '', 'testes') or die("Não foi possível realizar a conexão");
	mysqli_select_db($con, "testes");
	$resultado = mysqli_query($con, "SELECT * FROM administrador where email='".$_REQUEST["login_Email"]."' AND senha='".$_REQUEST["login_Senha"]."'");
	$row = mysqli_fetch_array($resultado);		
		
	if (!$row) {
		echo "<script>alert('Usuário ou senha errado');location.href=\"login_admin.html\"</script>";
	}else{
		session_start();
		$_SESSION['email'] = $_REQUEST["login_Email"];
		$_SESSION['senha'] = $_REQUEST["login_Senha"];
		$_SESSION['ID_admin'] = $row['ID_usuario'];
		header( "Location: menu.php");
	}
	mysqli_free_result($resultado);
	$fechou = mysqli_close($con);
?>

