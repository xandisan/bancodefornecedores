<?php
require('config/funcoes.php');
conexao();

//verificar se o usuario esta logado
session_start();
if((!isset ($_SESSION['login']) == true) or (!isset ($_SESSION['senha']) == true))
{
unset($_SESSION['login']);
unset($_SESSION['senha']);
header('location:index.php');
}
$logado = $_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | Seja Bem-Vindo!</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css"/>
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
	<?php include('includes/topo.php'); ?>
    <section>

        <div class="container12">
            <div class="row">
                <div class="caixa-identificacao">
                    <p><?php echo $logado?> <a href="logout.php">sair</a></p>
                </div>
            </div>
            <div class="row">
                <h2>Seja bem-vindo</h2>
            </div>    
        </div>
    </section>
    <?php include('includes/rodape.php'); ?>
</body>
</html>