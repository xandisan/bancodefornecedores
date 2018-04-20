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

//CONSULTA PARA MONTAR SELECT
$sql_select = "SELECT id_tipo_usuario, nome FROM tipo_usuario";
$consulta = mysql_query($sql_select);

if (isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $status = 0;
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
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $titulo ?> | ADMIN | USUÁRIO | CADASTRO</title>
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
                    <form method="POST"  enctype="multipart/form-data" action="" class="column8">
                         <div class="group column6">      
                              <input type="text" name="nome" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Name</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="email" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Email</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="telefone" id="telefone">
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Telefone</label>
                        </div>
                        <div class="group column6">      
                              <input type="text" name="login" id="login" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Login</label>
                        </div>
                        <div class="group column6">      
                              <input type="password" name="senha" id="senha" required/>
                              <span class="highlight"></span>
                              <span class="bar"></span>
                              <label>Senha</label>
                        </div>
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
                        <label class="submit">
                            <input type="submit" name="enviar" value="cadastrar" />
                        </label>
                    </form>
                </div>
            </div>
        </section>
        <?php include('../includes/rodape.php'); ?>
        <script src='../../js/jquery-1.12.0.min.js'></script>
        <script src='../../js/jquery.maskedinput.min.js'></script>
        <script src='../../js/script.js'></script>
        </script>


    </div>
</body>/
</html>