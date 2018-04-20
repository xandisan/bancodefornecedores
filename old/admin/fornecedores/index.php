<?php
require('../config/funcoes.php');
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

if (isset($_POST['atualizar'])){
	$sql_atualizabd = "UPDATE fornecedores SET nome='".$_POST['nome']."', servico='".$_POST['servico']."', descricao='".$_POST['descricao']."', contato='".$_POST['contato']."', telefone='".$_POST['telefone']."', email='".$_POST['email']."' WHERE id_fornecedor=".$_POST['id_fornecedor'];
	atualizar($sql_atualizabd);
	unset($_POST['atualizar']);
	unset($_GET['acao']);
	unset($_GET['id_fornecedor']);
}
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
</head>
<body>
    
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/admin.css"/>
<title>GDC</title>
</head>

<body>
    	<?php include('../includes/topo.php'); ?>
        <section>
            <div class="container12">
                <div class="row">
                    <div class="caixa-identificacao">
                        <p><?php echo $logado?> <a href="logout.php">sair</a></p>
                    </div>
                </div>
                <div class="row">

                    <h2>Fornecedores</h2>
                    <a href="form.php" class="novo right">Novo Cadastro</a>
                    
                    <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'ok')){ ?>
                        <p>Cadastrado com sucesso!</p>
                    <?php } ?>

                    <div class="sep10"></div>
                    <?php
                    if  ((isset($_GET['acao'])) && ($_GET['acao'] == 'alterar') && (isset($_GET['id_fornecedor']))){
                        $sql_update = "SELECT * FROM fornecedores WHERE id_fornecedor=".$_GET['id_fornecedor']." LIMIT 1";
                        $rs_atualiza = seleciona($sql_update);
                        while($resupdate = mysql_fetch_assoc($rs_atualiza)){

                        ?>
                        <form method="POST" enctype="multipart/form-data" action="">
                            <input type="text" name="nome" value="<?php echo($resupdate['nome']);?>" /><br />
                            <input type="text" name="email" value="<?php echo($resupdate['email']);?>" /><br />
                            <input type="text" name="telefone" value="<?php echo($resupdate['telefone']);?>" /><br />
                            <input type="text" name="senha" value="<?php echo($resupdate['senha']);?>" /><br />
                            <input type="hidden" name="id_fornecedor" value="<?php echo($resupdate['id_fornecedor']);?>" />
                            <input type="submit" name="atualizar" value="atualizar" /><br />
                        </form>
                        <?php	
                        }
                    }else{
                    }
                    
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
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
                            while ($res = mysql_fetch_assoc($rs_clientes)){
                        ?>	<tr>			
                                <td><?php echo($res['id_fornecedor']);?></td>
                                <td><?php echo($res['nome']);?></td>
                                <td><?php echo($res['servico']);?></td>
                                <td><?php echo($res['descricao']);?></td>
                                <td><?php echo($res['contato']);?></td>
                                <td><?php echo($res['telefone']);?></td>
                                <td><?php echo($res['email']);?></td>
                                <td>
                                    <a href="index.php?acao=alterar&amp;id_fornecedor=<?php echo ($res['id_fornecedor']) ?>">Editar</a>
                                    <a href="index.php?acao=excluir&amp;id_fornecedor=<?php echo ($res['id_fornecedor']) ?>">Excluir</a>
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
        <div class="break"></div>
		<?php include('../includes/rodape.php'); ?>
    </div>
</body>
</html>