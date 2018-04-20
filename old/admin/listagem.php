<?php
require('config/funcoes.php');

conexao();

$sql_seleciona = "SELECT * FROM usuarios";
$rs_clientes = seleciona($sql_seleciona);

echo mysql_num_rows($rs_clientes);//TOTAL DE LINHAS DA TABELA
echo '<br /><br />';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
<title>GDC</title>
</head>

<body>
	<?php include('includes/topo.php'); ?>
    <div style="clear:both;"></div>
        <div class="lag9 content">
        	<h2>Seja bem-vindo ao meu gerenciamento de conteúdo</h2>
            <div class="sep10"></div>
            <ul>
            <?php
                while ($res = mysql_fetch_assoc($rs_clientes)){
            ?>			
                
                <li><?php echo($res['nome']);?> <?php echo($res['sobrenome']);?></li>
            
            <?php
            }	
            ?>
            </ul>
        </div>
        <div class="break"></div>
        <?php include('includes/rodape.php');?>
</body>
</html>