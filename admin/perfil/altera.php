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
//ATUALIZA LINHA
if (isset($_POST['atualizar'])){

    $senha_encode = base64_encode($_POST['senha']);
	$sql_atualizabd = "UPDATE usuarios SET nome='".$_POST['nome']."', email='".$_POST['email']."', telefone='".$_POST['telefone']."', login='".$_POST['login']."', senha='".$senha_encode."', id_tipo_usuario='".$_POST['id_tipo_usuario']."', status='".$_POST['status']."' WHERE id_usuario=".$_POST['id_usuario'];
	atualizar($sql_atualizabd);
	unset($_POST['atualizar']);
	unset($_GET['acao']);
	unset($_GET['id_usuario']);
    header('location:'.$caminho.'/admin/perfil');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | PERFIL | ALTERA CADASTRO</title>
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
            <h2>Editar Perfil</h2>
            <div class="row">
                <div class="column8 prefix4">
                    <div class="box-prefil">
                        <div class="row">
                            <a href="javascript:history.go(-1)" class="voltar">voltar</a>
                        </div>
                        <?php
                        if  ((isset($_GET['acao'])) && ($_GET['acao'] == 'alterar') && (isset($_GET['id_usuario']))){
                            $sql_update = "SELECT * FROM usuarios WHERE id_usuario=".$_GET['id_usuario']." LIMIT 1";
                            $rs_atualiza = seleciona($sql_update);
                            while($resupdate = mysql_fetch_assoc($rs_atualiza)){
                                 $senha = base64_decode($resupdate['senha']);
                            ?>
                            <form method="POST" enctype="multipart/form-data" action="">
                                <div class="group">
                                    <label>Name</label>  
                                    <input type="text" name="nome" value="<?php echo($resupdate['nome']);?>" required/>
                                </div>
                                <div class="group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo($resupdate['email']);?>" required/>
                                </div>
                                <div class="group"> 
                                   <label>Telefone</label>
                                    <input type="text" name="telefone" value="<?php echo($resupdate['telefone']);?>" id="telefone">
                                </div>
                                <div class="group"> 
                                    <label>Login</label> 
                                    <input type="text" name="login" id="login" value="<?php echo($resupdate['login']);?>" required/>
                                </div>
                                <div class="group"> 
                                    <label>Senha</label>
                                    <input type="password" name="senha" value="<?php echo $senha;?>" required/>
                                </div>
                                <input type="hidden" name="id_tipo_usuario" value="<?php echo($resupdate['id_tipo_usuario']);?>" />
                                <input type="hidden" name="status" value="<?php echo($resupdate['status']);?>" />
                                <input type="hidden" name="id_usuario" value="<?php echo($resupdate['id_usuario']);?>" />
                                <label class="submit">
                                  <input type="submit" name="atualizar" value="atualizar" />
                                </label>
                            </form>
                            <?php   
                            }
                        }else{
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $caminho ?>/js/script.js"></script>
</body>
</html>