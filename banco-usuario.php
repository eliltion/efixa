<?php

require_once("conecta.php");			

function buscaUsuario($conexao, $matricula, $senha) {
    $senhaMd5 = md5($senha);
    $email = mysqli_real_escape_string($conexao, $matricula);
    $query = "select * from usuario where matricula='{$matricula}' and senha='{$senhaMd5}'";
    echo $query;

    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

