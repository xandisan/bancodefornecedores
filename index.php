<?php
require('admin/config/funcoes.php');

$connl = conexao();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name="robots" content="noindex, nofollow">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
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
                        $sql_seleciona = "SELECT * FROM fornecedores";
                        $rs_clientes = seleciona($sql_seleciona);
						//die(var_dump($rs_clientes));
                        while ($res = mysqli_fetch_assoc($rs_clientes)){
                    ?>	<tr>
                            <td><?php echo($res['nome']);?></td>
                            <td><?php echo($res['servico']);?></td>
                            <td><?php echo($res['descricao']);?></td>
                            <td><?php echo(nl2br($res['contato']));?></td>
                            <td><?php echo(nl2br($res['telefone']));?></td>
                            <td><?php echo(nl2br($res['email']));?></td>
                        </tr>
                    <?php
                    }	
                    ?>
					</tbody>	
				</table>
			</div>
		</div>
	</section>
</body>
</html>