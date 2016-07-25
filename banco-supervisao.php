<?php

require_once("conecta.php");			

function listaSupervisoes($conexao) {
	$supervisoes = array();
	$query = "select * from supervisao";
	$resultado = mysqli_query($conexao, $query);
	while($supervisao = mysqli_fetch_assoc($resultado)) {
		array_push($supervisoes, $supervisao);
	}
	return $supervisoes;
}
