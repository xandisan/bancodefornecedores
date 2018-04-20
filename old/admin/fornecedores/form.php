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
                <div class="row">
                    <div class="caixa-identificacao">
                        <p><?php echo $logado?> <a href="logout.php">sair</a></p>
                    </div>
                </div>
                <div class="row">
                    <h2>Seja bem-vindo ao meu gerenciamento de conteúdo</h2>
                    <?php if(isset($_GET['cadastro']) && ($_GET['cadastro'] == 'erro')){ ?>
                        <p>Cadastrado com sucesso!</p>
                    <?php } ?>
                    <div class="sep10"></div>
                    <form method="POST"  enctype="multipart/form-data" action="" class="column8">

                        <div class="group column6">      
                              <input type="text" name="nome" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Nome</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="servico" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Serviço</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="descricao" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Descrição</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="contato" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Contato</label>
                        </div>                       
                        <div class="group column6">      
                              <input type="text" name="telefone" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Telefone</label>
                        </div>                         
                         <div class="group column6">      
                              <input type="text" name="email" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Email</label>
                        </div>                       
                        <label class="submit">
                            <input type="submit" name="enviar" value="cadastrar" />
                        </label>
                    </form>
                </div>
            </div>
        </section>
        <?php include('../includes/rodape.php'); ?>
    </div>
</body>
</html>