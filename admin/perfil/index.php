<?php
require('../config/funcoes.php');
conexao();

//verificar se o usuario esta logado
session_start();
if((!isset ($_SESSION['login']) == true) or (!isset ($_SESSION['senha']) == true))
{
unset($_SESSION['login']);
unset($_SESSION['senha']);
header('location:'.$caminho.'/admin/index.php');
}
$logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | PERFIL</title>
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
	<?php include('../includes/topo.php'); ?>
    <section>
        <div class="container12">
            <?php include ('../includes/caixa-identificacao.php');?>
            <h2>Perfil</h2>
            <div class="row">
                <div class="column8 prefix4">
                    <div class="box-prefil">
                        <?php
                        $sql_perfil = "SELECT * FROM usuarios WHERE login = '$logado'";
                        $perfil = mysql_query($sql_perfil);
                        while ($res = mysql_fetch_array($perfil)){
                        ?>
                            <a class="editar" href="altera.php?acao=alterar&amp;id_usuario=<?php echo ($res['id_usuario']) ?>">Editar</a><br>
                            <p><?php echo($res['nome']); ?></p>
                            <p><?php echo($res['email']); ?></p>
                            <p><?php echo($res['telefone']); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src='../../js/jquery-1.12.0.min.js'></script>
    <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $caminho ?>/js/script.js"></script>
</body>
</html>