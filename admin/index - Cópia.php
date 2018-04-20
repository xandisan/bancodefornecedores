<?php
require('config/funcoes.php');
conexao();

//verificar se o usuario esta logado
session_start();
if((!isset ($_SESSION['login']) == true) or (!isset ($_SESSION['senha']) == true))
{
	unset($_SESSION['login']);
	unset($_SESSION['senha']);  
}else{
header('location:'.$caminho.'/admin/fornecedores/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | Seja Bem-Vindo!</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $caminho ?>/css/admin.css"/>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
    <script src="http://js.opovo.com.br/html5shiv.js"></script>
    <!-- HTML5 NO IE7 8 -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<section>
<div class="conatiner12">
	<div class="row">
		<div class="box-login">
			<?php if(isset($_GET['login']) && ($_GET['login'] == 'erro')){ ?><p>Dados inválidos!</p><?php } ?>
			<form method="post" action="verificando.php">
	            <div class="group">      
	                  <input name="login" type="text" id="login" required/>
	                  <span class="highlight"></span>
	                  <span class="bar"></span>
	                  <label>Login</label>
	            </div>
	            <div class="group">      
	                  <input name="senha" type="password" id="senha" required/>
	                  <span class="highlight"></span>
	                  <span class="bar"></span>
	                  <label>Senha</label>
	            </div>
	            <label class="submit">
					<input type="submit" name="Submit" value="Login">
				</label>
			</form>
		<div>
	</div>
</div>
</section>
</body>

</html>