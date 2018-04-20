<?php
require('admin/config/funcoes.php');
conexao();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?> | BUSCA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
	<script src="http://js.opovo.com.br/html5shiv.js"></script>
	<!-- HTML5 NO IE7 8 -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<header>
		<div class="container12">
			<div class="row">
				<div class="column2">
					<a href="">
						<img src="<?php echo $caminho; ?>/img/logo2.png" alt="">
					</a>
				</div>
				<form class="search column10" method="POST" action="busca.php">
					<div class="grup">
						<button type="submit"><span>Buscar</span></button>
						<input type="text" name="valor_busca" required>
					</div>
				</form>	
			</div>
		</div>
	</header>
	<section>
		<div class="container12">
			<h2>Fornecedores</h2>
            <div class="row">
                <a href="javascript:history.go(-1)" class="voltar">voltar</a>
            </div>
			<div class="row">
				<?php 
					if(!empty($_POST['valor_busca'])){
						$buscar = trim($_POST['valor_busca']);
					}else{
						$buscar = '';
					}
					$connl = conexao();
					$sql = mysqli_query($connl,"SELECT * FROM fornecedores WHERE nome LIKE '%".$buscar."%' OR `servico` LIKE '%".$buscar."%' OR `descricao` LIKE '%".$buscar."%' OR `contato` LIKE '%".$buscar."%' OR `telefone` LIKE '%".$buscar."%' OR `email` LIKE '%".$buscar."%'");
					$row = mysqli_num_rows($sql);
				?>
				<?php if($row > 0) { ?>
				<table>
					<thead>
						<tr>
							<th>Fornecedor</th>
							<th>Descrição</th>
							<th>Serviço</th>
							<th>Contato</th>
							<th>Telefone</th>
							<th>E-mail</th>
						</tr>
					</thead>
					<tbody>
					<?php while ($linha = mysqli_fetch_array($sql)) {

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
</body>
</html>