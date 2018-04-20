<?php

$caminho = 'http://fornecedores.com:8080';
$caminhoUpload = 'C:/xampp/htdocs/bancodefornecedores/arquivos';
$titulo ="BANCO DE FORNECEDORES";

function conexao(){
	$banco   = 'fornecedores';
	$usuario = 'root';
	$senha   = '';
	$host    = 'localhost';
	
	$conn = mysql_connect($host,$usuario,$senha) or die ('Erro na conexão: '.mysql_error());
	mysql_select_db($banco) or die ('Erro na seleção do banco: '.mysql_error());;
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET charactes_set_connection=utf8");
	mysql_query("SET charactes_set_client=utf8");
	mysql_query("SET charactes_set_results=utf8");
}

function inserir($sql){
	if (mysql_query($sql)){
		return TRUE;
	}else{
		return FALSE;
	}
}

function seleciona($sql){
	return mysql_query($sql);
}

function atualizar($sql){
	if (mysql_query($sql)){
		return TRUE;
	}else{
		return FALSE;
	}
}

function excluir($sql){
	if (mysql_query($sql)){
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
	while ($obj = mysql_fetch_object($rs)){			
		echo("t<option value='".$obj->$valor."' > ". $obj->$descricao." </option>n");
	}
	echo("</select>n");
}



;?>