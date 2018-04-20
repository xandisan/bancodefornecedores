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
//CONSULTA PARA MONTAR SELECT
$sql_select = "SELECT id_tipo_usuario, nome FROM tipo_usuario";
$consulta = mysql_query($sql_select);
//INSERI INFORMAÇOES NO BANCO
if (isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];
    $senha = base64_encode($_POST['senha']);
    $tipo_usuario = $_POST['tipo_usuario'];
    $status = 1;
    $sql_inserir = "INSERT INTO usuarios (nome, email, telefone, senha, login, id_tipo_usuario, status) VALUES ('$nome', '$email', '$telefone', '$senha', '$login', '$tipo_usuario', '$status')";
    if (inserir($sql_inserir)){
    	//echo ('Registro inserido com sucesso, ID do registro: ' .mysql_insert_id());
    	unset ($_POST['enviar']);
          header('Location:'.$caminho .'/'. 'admin/usuarios/index.php?cadastro=ok'); 
    }else{
          header('Location:'.$caminho .'/'. 'admin/usuarios/form.php?cadastro=ok'); 
    	//echo ('Erro na inserção: ' .mysql_error());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | USUÁRIOS | CADASTRO</title>
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
                    <h2>Cadastrar novo usuário</h2>
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
                                <label>E-mail</label>    
                                <input type="text" name="email" required/>
                          </div>
                          <div class="group">  
                                 <label>Telefone</label>                             
                                <input type="text" name="telefone" required/>
                          </div>
                          <div class="group"> 
                                <label>Login</label>    
                                <input type="text" name="login" required/>
                          </div>
                          <div class="group">
                                <label>Senha</label>      
                                <input type="password" name="senha" required/>
                          </div>
                          <div class="styled-select">
                            <label>Tipo da conta</label>
                            <div class="container-select">
                              <select name="tipo_usuario">
                                <?php
                                //pegando os dados
                                while($registro = mysql_fetch_assoc($consulta)){ 
                                ?>
                                    <option value="<?php echo $registro['id_tipo_usuario'] ?>">
                                        <?php echo $registro['nome'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
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