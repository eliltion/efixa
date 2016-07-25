<?php

require_once("conecta.php");			

function listaEscalas($conexao) {
	$escalas = array();
	$query = "select * from escala";
    
	$resultado = mysqli_query($conexao, $query);
	while($escala = mysqli_fetch_assoc($resultado)) {
		array_push($escalas, $escala);
	}
	return $escalas;
}
