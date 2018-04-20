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
<script type="text/javascript">
function loginsuccessfully(){
	setTimeout("window.location='logado.php'", 1);
}
function loginfailed(){
	setTimeout("window.location='index.php'", 1);
}
</script>

</head>

<body>

	<div class="container">


<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'") or die (mysql_error());
$row = mysql_num_rows($sql);

if($row > 0){
	session_start();
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = $_POST['senha'];
	echo "login realizado com sucesso!";
	echo "<script>loginsuccessfully()</script>";
}else{
	echo "Nome de usuário ou senha iválidos";
	echo "<script>loginfailed()</script>";
}

?>
    </div>

</body>
</html>