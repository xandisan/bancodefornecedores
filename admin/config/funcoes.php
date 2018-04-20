<?php
$caminho = 'http://192.168.2.177:1010/bancodefornecedores';
$caminhoUpload = 'C:/xampp/htdocs/bancodefornecedores/arquivos';
$titulo ="Banco de Fornecedores";

function conexao(){
	$banco   = 'fornecedores';
	$usuario = 'root';
	$senha   = '';
	$host    = 'localhost';
	
	$conn = mysqli_connect($host,$usuario,$senha) or die ('Erro na conexão: '.mysqli_error());
	mysqli_select_db($conn, $banco) or die ('Erro na seleção do banco: '.mysqli_error());;
	mysqli_query($conn,"SET NAMES 'utf8'");
	mysqli_query($conn,"SET charactes_set_connection=utf8");
	mysqli_query($conn,"SET charactes_set_client=utf8");
	mysqli_query($conn,"SET charactes_set_results=utf8");
	
	return $conn;
}
function inserir($sql){
	$connl = conexao();
	if (mysqli_query($connl,$sql)){
		return TRUE;
	}else{
		return FALSE;
	}
}
function seleciona($sql){
	$connl = conexao();
	return mysqli_query($connl,$sql);
}
function atualizar($sql){
	$connl = conexao();
	if (mysqli_query($connl,$sql)){
		return TRUE;
	}else{
		return FALSE;
	}
}
function excluir($sql){
	$connl = conexao();
	if (mysqli_query($connl,$sql)){
		return TRUE;
	}else{
		return FALSE;
	}
}
function upload($destino, $nomeImagem, $largura, $pasta){
	$img = imagecreatefromjpeg($destino);
	$x = imagesx($img);
	$y = imagesy($img);
	$altura = ($largura * $y) / $x;
	
	$novaImagem = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($novaImagem, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagejpeg($novaImagem, "$pasta/$nomeImagem");
	imagedestroy($img);
	imagedestroy($novaImagem);
}
function montaCombo($nome, $rs, $valor, $descricao){
   	echo("<select name='$nome' class='combo'>n");
	echo("t<option value=''>--Selecione--</option>n");
	while ($obj = mysqli_fetch_object($rs)){			
		echo("t<option value='".$obj->$valor."' > ". $obj->$descricao." </option>n");
	}
	echo("</select>n");
}
;?>