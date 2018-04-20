<?php
require('config/funcoes.php');
conexao();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
<title>GDC | AUTENTICANDO USUÁRIO</title>
</head>
<body>
	<div class="container">
		<?php
		$login = $_POST['login'];
		$senha = base64_encode($_POST['senha']);

		$connl = conexao();
		$sql = mysqli_query($connl, "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'") or die (mysqli_error());
		$row = mysqli_num_rows($sql);

		if($row > 0){
			session_start();
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['senha'] = $_POST['senha'];
			echo "login realizado com sucesso!";
			header('location:'.$caminho.'/admin/fornecedores/');
		}else{
			echo "Nome de usuário ou senha iválidos";
			header('location:'.$caminho.'/admin/index.php?login=erro');
		}
		?>
    </div>
</body>
</html>