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
//EXCLUI LINHA DO BANCO
if (isset($_GET['acao']) &&  $_GET['acao']== 'excluir' ){
    $sql_excluir = "DELETE FROM usuarios WHERE id_usuario=".$_GET['id_usuario'];
    excluir($sql_excluir);
    unset($_GET['acao']);
    unset($_GET['id_usuario']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | USUÁRIOS</title>
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
    <section class="tb">
        <div class="container12">
            <?php include ('../includes/caixa-identificacao.php');?>
            <h2>Usuários</h2>
            <div class="row">
                <div class="column12 ajuste">
                    <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'ok')){ ?>
                        <p>Cadastrado com sucesso!</p>
                    <?php } ?>
                    <a href="form.php" class="novo"><img src="../../img/admin/cross.png" alt="novo cadastro"> <span>Novo Cadastro</span></a>
                </div>
            </div>
            <div class="row">
                <table class="usuario">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_seleciona = "SELECT * FROM usuarios";
                        $rs_clientes = seleciona($sql_seleciona);
                        while ($res = mysql_fetch_assoc($rs_clientes)){
                    ?>  <tr>
                            <td><?php echo($res['nome']);?></td>
                            <td><?php echo($res['email']);?></td>
                            <td><?php echo($res['telefone']);?></td>
                            <td>
                                <a class="editar" href="altera.php?acao=alterar&amp;id_usuario=<?php echo ($res['id_usuario']) ?>"><img src="../img/admin/editar.png" alt=""></a>
                                <a class="deletar" href="index.php?acao=excluir&amp;id_usuario=<?php echo ($res['id_usuario']) ?>"><img src="../img/admin/deletar.png" alt=""></a>
                            </td>
                        </tr>
                    <?php
                    }   
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $caminho ?>/js/script.js"></script>
</body>
</html>