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
//INSERI LINHA
if (isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $servico = $_POST['servico'];
    $descricao = $_POST['descricao'];
    $contato = $_POST['contato'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $sql_inserir = "INSERT INTO fornecedores (nome, servico, descricao, contato, telefone, email) VALUES ('$nome', '$servico', '$descricao', '$contato', '$telefone', '$email')";
    if (inserir($sql_inserir)){
    //echo ('Registro inserido com sucesso, ID do registro: ' .mysql_insert_id());
    unset ($_POST['enviar']);
        header('Location:'.$caminho .'/'. 'admin/fornecedores/index.php?cadastro=ok'); 
    }else{
        header('Location:'.$caminho .'/'. 'admin/fornecedores/form.php?cadastro=ok'); 
    //echo ('Erro na inserção: ' .mysql_error());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | FORNECEDORES | CADASTRO</title>
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
            <div class="row">
                <h2>Cadastrar novo fornecedor</h2>
                <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'erro')){ ?>
                    <p>Cadastrado com sucesso!</p>
                <?php } ?>
                <div class="column8 prefix4">
                  <form method="POST"  enctype="multipart/form-data" action="" class="cadastro">
                      <div class="row">
                          <a href="javascript:history.go(-1)" class="voltar">voltar</a>
                      </div>
                      <div class="group"> 
                            <label>Nome</label>     
                            <input type="text" name="nome" required/>
                      </div>
                      <div class="group"> 
                        <label>Serviço</label>     
                            <input type="text" name="servico" required/>
                      </div>
                      <div class="group">
                      <label>Descrição</label>      
                            <input type="text" name="descricao" required/>
                      </div>
                      <div class="group">
                          <label>Contato <p>Separe os contatos com enter</p></label>
                          <textarea name="contato" required></textarea> 
                      </div> 
                      <div class="group">
                          <label>Telefone <p>Separe os telefones com enter</p></label>
                          <textarea name="telefone" required></textarea>      
                      </div>    
                      <div class="group">
                          <label>E-mail <p>Separe os e-mails com enter</p></label>
                          <textarea name="email" required></textarea>
                      </div>                     
                      <label class="submit">
                          <input type="submit" name="enviar" value="cadastrar" />
                      </label>
                  </form>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo $caminho ?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?php echo $caminho ?>/js/script.js"></script>
</body>
</html>