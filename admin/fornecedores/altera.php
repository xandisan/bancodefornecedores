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

if (isset($_POST['atualizar'])){
    $sql_atualizabd = "UPDATE fornecedores SET nome='".$_POST['nome']."', servico='".$_POST['servico']."', descricao='".$_POST['descricao']."', contato='".$_POST['contato']."', telefone='".$_POST['telefone']."', email='".$_POST['email']."' WHERE id_fornecedor=".$_POST['id_fornecedor'];
    atualizar($sql_atualizabd);
    unset($_POST['atualizar']);
    unset($_GET['acao']);
    unset($_GET['id_fornecedor']);
    header('location:'.$caminho.'/admin/fornecedores');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | ALTERA CADASTRO</title>
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
                    <h2>Editar fornecedores</h2>
                    <div class="row">
                        <div class="column8 prefix4">
                            <div class="box-prefil">
                                <div class="row">
                                    <a href="<?php echo $caminho;?>/admin/fornecedores" class="voltar">voltar</a>
                                </div>
                                <?php
                                    if  ((isset($_GET['acao'])) && ($_GET['acao'] == 'alterar') && (isset($_GET['id_fornecedor']))){
                                        $sql_update = "SELECT * FROM fornecedores WHERE id_fornecedor=".$_GET['id_fornecedor']." LIMIT 1";
                                        $rs_atualiza = seleciona($sql_update);
                                        while($resupdate = mysql_fetch_assoc($rs_atualiza)){
                                    ?>
                                    <form method="POST" enctype="multipart/form-data" action="">
                                        <div class="group"> 
                                            <label>Nome</label>     
                                            <input type="text" name="nome" value="<?php echo($resupdate['nome']);?>" required/>
                                        </div>
                                        <div class="group"> 
                                            <label>Serviço</label>     
                                            <input type="text" name="servico" value="<?php echo($resupdate['servico']);?>" required/>
                                        </div>
                                        <div class="group">  
                                            <label>Descrição</label>    
                                            <input type="text" name="descricao" value="<?php echo($resupdate['descricao']);?>" required>
                                        </div>
                                        <div class="group">
                                            <label>Contato <p>Separe os contatos com enter</p></label>
                                            <textarea name="contato" required><?php echo($resupdate['contato']);?></textarea>      
                                        </div>
                                        <div class="group">
                                            <label>Telefone <p>Separe os telefones com enter</p></label>
                                            <textarea name="telefone" required><?php echo($resupdate['telefone']);?></textarea>      
                                        </div>
                                        <div class="group">
                                            <label>E-mail <p>Separe os e-mails com enter</p></label>
                                            <textarea name="email" required><?php echo($resupdate['email']);?></textarea>      
                                        </div>
                                        <label class="submit">
                                          <input type="submit" name="atualizar" value="atualizar" />
                                        </label>

                                        <!-- HIDDEN  -->
                                        <input type="hidden" name="id_fornecedor" value="<?php echo($resupdate['id_fornecedor']);?>" />


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
		<?php include('../includes/rodape.php'); ?>
        <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
        <script src="<?php echo $caminho ?>/js/script.js"></script>

    </div>
</body>
</html>