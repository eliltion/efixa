<?php

require_once("conecta.php");			

function listaPlanos($conexao) {
	$planos = array();
	$query = "select * from plano  ORDER BY plano";
	$resultado = mysqli_query($conexao, $query);
	while($plano = mysqli_fetch_assoc($resultado)) {
		array_push($planos, $plano);
	}
	return $planos;
}