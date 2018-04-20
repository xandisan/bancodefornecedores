<?php
require('../config/funcoes.php');
conexao();
$caminhoarquivos = $_SERVER['DOCUMENT_ROOT'];
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
    $sql_excluir = "DELETE FROM fornecedores WHERE id_fornecedor=".$_GET['id_fornecedor'];
    atualizar($sql_excluir);
    unset($_GET['acao']);
    unset($_GET['id_fornecedor']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | FORNECEDORES</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $caminho ?>/css/admin.css"/>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
    <script src="http://js.opovo.com.br/html5shiv.js"></script>
    <!-- HTML5 NO IE7 8 -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!--[if IE]>
        <script>alert('a');</script>
    <![endif]-->
</head>
<body>
	<?php include('../includes/topo.php'); ?>
    <section class="tb">
        <div class="container12">
            <?php include ('../includes/caixa-identificacao.php');?>
            <h2>Fornecedores</h2>
            <div class="row">
                <div class="column12 ajuste">
                    <form class="search" method="POST" action="busca.php">
                        <div class="grup">
                            <button type="submit"><span>Buscar</span></button>
                            <input type="text" name="valor_busca" required>
                        </div>
                    </form>
                    <a href="form.php" class="novo"><img src="../../img/admin/cross.png" alt="novo cadastro"> <span>Novo Cadastro</span></a>
                </div>
            </div>
            <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'ok')){ ?>
                <p>Cadastrado com sucesso!</p>
            <?php } ?>
            <div class="row">
                <table class="fornecedores">
                    <thead>
                        <tr>
                            <th>Fornecedor</th>
                            <th>Serviço</th>
                            <th>Descrição</th>
                            <th>Contato</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql_seleciona = "SELECT * FROM fornecedores";
                        $rs_clientes = seleciona($sql_seleciona);
                        while ($res = mysqli_fetch_assoc($rs_clientes)){
                    ?>	<tr>			
                            <td><?php echo($res['nome']);?></td>
                            <td><?php echo($res['servico']);?></td>
                            <td><?php echo($res['descricao']);?></td>
                            <td><?php echo(nl2br($res['contato']));?></td>
                            <td><?php echo(nl2br($res['telefone']));?></td>
                            <td><?php echo(nl2br($res['email']));?></td>
                            <td>
                                <a class="editar" href="altera.php?acao=alterar&amp;id_fornecedor=<?php echo ($res['id_fornecedor']) ?>"><img src="../img/admin/editar.png" alt=""></a>
                                <a class="deletar" href="index.php?acao=excluir&amp;id_fornecedor=<?php echo ($res['id_fornecedor']) ?>"><img src="../img/admin/deletar.png" alt=""></a>
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