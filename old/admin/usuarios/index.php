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
	$sql_atualizabd = "UPDATE usuarios SET nome='".$_POST['nome']."', email='".$_POST['email']."', telefone='".$_POST['telefone']."', senha='".$_POST['senha']."' WHERE id_usuario=".$_POST['id_usuario'];
	atualizar($sql_atualizabd);
	unset($_POST['atualizar']);
	unset($_GET['acao']);
	unset($_GET['id_usuario']);
}
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
    <title><?php echo $titulo ?> | ADMIN |</title>
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
                    <div class="row">
                        <div class="caixa-identificacao">
                            <p><?php echo $logado?> <a href="logout.php">sair</a></p>
                        </div>
                    </div>
                    <h2>Clientes</h2>
                    <div class="row">
                        <div class="column12">
                            <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'ok')){ ?>
                                <p>Cadastrado com sucesso!</p>
                            <?php } ?>
                            <a href="form.php" class="novo">Novo Cadastro</a>
                        </div>
                    </div>
                    <div class="row">
                                            
                        <?php
                        if  ((isset($_GET['acao'])) && ($_GET['acao'] == 'alterar') && (isset($_GET['id_usuario']))){
                            $sql_update = "SELECT * FROM usuarios WHERE id_usuario=".$_GET['id_usuario']." LIMIT 1";
                            $rs_atualiza = seleciona($sql_update);
                            while($resupdate = mysql_fetch_assoc($rs_atualiza)){

                            ?>
                            <form method="POST" enctype="multipart/form-data" action="">
                                <input type="text" name="nome" value="<?php echo($resupdate['nome']);?>" /><br />
                                <input type="text" name="email" value="<?php echo($resupdate['email']);?>" /><br />
                                <input type="text" name="telefone" value="<?php echo($resupdate['telefone']);?>" /><br />
                                <input type="text" name="senha" value="<?php echo($resupdate['senha']);?>" /><br />
                                <input type="hidden" name="id_usuario" value="<?php echo($resupdate['id_usuario']);?>" />
                                <input type="submit" name="atualizar" value="atualizar" /><br />
                            </form>
                            <?php   
                            }
                        }else{
                        }
                    
                        ?>
                        <table class="usuario">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
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
                                    <td><?php echo($res['id_usuario']);?></td>
                                    <td><?php echo($res['nome']);?></td>
                                    <td><?php echo($res['email']);?></td>
                                    <td><?php echo($res['telefone']);?></td>
                                    <td>
                                        <a class="editar" href="index.php?acao=alterar&amp;id_usuario=<?php echo ($res['id_usuario']) ?>">Editar</a>
                                        <a class="deletar" href="index.php?acao=excluir&amp;id_usuario=<?php echo ($res['id_usuario']) ?>">X</a>
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
		<?php include('../includes/rodape.php'); ?>
        <script src='../../js/jquery-1.12.0.min.js'></script>

    </div>
</body>
</html>