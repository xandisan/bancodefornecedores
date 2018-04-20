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
    $sql_excluir = "DELETE FROM fornecedores WHERE id_fornecedor=".$_GET['id_fornecedor'];
    atualizar($sql_excluir);
    unset($_GET['acao']);
    unset($_GET['id_fornecedor']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?> | ADMIN | FORNECEDORES | BUSCA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" type="text/css" href="<?php echo $caminho ?>/css/admin.css"/>
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
			<h2>Fornecedores</h2>
            <div class="row">
                <div class="column12 ajuste">
                    <form class="search" method="POST" action="busca.php">
                        <div class="grup">
                            <button type="submit"><span>Buscar</span></button>
                            <input type="text" name="valor_busca" required>
                        </div>
                    </form>
                    <a href="form.php" class="novo"><img src="<?php echo $caminho; ?>/img/admin/cross.png" alt="novo cadastro"> <span>Novo Cadastro</span></a>
                    <a href="javascript:history.go(-1)" class="voltar-busca">voltar</a>
                </div>
            </div>
            <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'ok')){ ?>
                <p>Cadastrado com sucesso!</p>
            <?php } ?>
			<div class="row">
				<?php 
					if(!empty($_POST['valor_busca'])){
						$buscar = trim($_POST['valor_busca']);
					}else{
						$buscar = '';
					}
					$sql = mysql_query("SELECT * FROM fornecedores WHERE nome LIKE '%".$buscar."%' OR `servico` LIKE '%".$buscar."%' OR `descricao` LIKE '%".$buscar."%' OR `contato` LIKE '%".$buscar."%' OR `telefone` LIKE '%".$buscar."%' OR `email` LIKE '%".$buscar."%'");
					$row = mysql_num_rows($sql);
				?>
				<?php if($row > 0) { ?>
				<table class="fornecedores">
					<thead>
						<tr>
							<th>Fornecedor</th>
							<th>Descrição</th>
							<th>Serviço</th>
							<th>Contato</th>
							<th>Telefone</th>
							<th>E-mail</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($linha = mysql_fetch_array($sql)) {

						$id_fornecedor = $linha['id_fornecedor'];
						$nome = $linha['nome'];
						$servico = $linha['servico'];
						$descricao = $linha['descricao'];
						$contato = $linha['contato'];
						$telefone = $linha['telefone'];
						$email = $linha['email'];
					?>
						<tr>
                            <td><?php echo $nome;?></td>
                            <td><?php echo $servico;?></td>
                            <td><?php echo $descricao;?></td>
                            <td><?php echo $contato;?></td>
                            <td><?php echo $telefone;?></td>
                            <td><?php echo $email;?></td>
                            <td>
                        	    <a class="editar" href="altera.php?acao=alterar&amp;id_fornecedor=<?php echo $id_fornecedor; ?>"><img src="<?php echo $caminho ?>/img/admin/editar.png" alt=""></a>
                                <a class="deletar" href="index.php?acao=excluir&amp;id_fornecedor=<?php echo $id_fornecedor; ?>"><img src="<?php echo $caminho ?>/img/admin/deletar.png" alt=""></a>
                            </td>
                        </tr>
					<?php } ?>	
                    </tbody>	
				</table>
				<?php } else { ?>
					<p>Sem resultado</p>
				<?php } ?>
			</div>
		</div>
	</section>
    <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $caminho ?>/js/script.js"></script>
</body>
</html>