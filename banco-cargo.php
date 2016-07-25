<?php

require_once("conecta.php");			

function listaCargos($conexao) {
	$cargos = array();
	$query = "select * from cargo ORDER BY nome";
	$resultado = mysqli_query($conexao, $query);
	while($cargo = mysqli_fetch_assoc($resultado)) {
		array_push($cargos, $cargo);
	}
	return $cargos;
}
