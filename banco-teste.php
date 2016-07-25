<?php

require_once("conecta.php");			

function buscaData($conexao) {
    $query = "select * from escala";
    $resultado = mysqli_query($conexao, $query);
    $datas = array();
    
    while($data = mysqli_fetch_assoc($resultado) ){
        array_push($datas, $data);
    }
    return $datas;
    
}

function calculaDias($conexao, $dataFim, $dataInicio){
    $query = "select DATEDIFF('$dataFim?','$dataInicio?') as dias";
    $resultado = mysqli_query($conexao, $query);
    
    return mysqli_fetch_assoc($resultado);
}
