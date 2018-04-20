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
						<h1>Banco de Fornecedores</h1>
					</a>
				</div>
				<form class="search column10" method="POST" action="busca.php">
					<div class="grup">
						<button type="submit"><span></span></button>
						<input type="text" required>
					</div>
				</form>	
			</div>
		</div>
	</header>
	<section>
		<div class="container12">
			<h2>Fornecedores</h2>
			<div class="row">
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
					<?php
						$buscar=$_POST ['buscar'];
						$sql = mysql_query(" SELECT * FROM fornecedores WHERE nome LIKE '%".$buscar."%'");
						$row = mysql_num_rows($sql);
						if($row > 0){
							while ($linha = mysql_fetch_array($sql)) {

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

							<?php
							}
							} else{echo "sem resultado";
						}
					?>	
                    </tbody>	
				</table>
			</div>
			<div class="row">
				<nav>
					<ul class="pagination">
						<li><a href="#"><span>&laquo;</span></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#"><span>&raquo;</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</section>
	<footer>
		<div class="container12">
			<div class="row">
				<div>
					<a title="O POVO Online" href="" class="logo-footer">
						<img width="120" height="15" alt="O POVO Online" src="img/o-povo.png">
					</a>
					<p>Grupo de Comunicação O POVO<br>Copyright &copy; 2016,<br>Todos os direitos reservados</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>