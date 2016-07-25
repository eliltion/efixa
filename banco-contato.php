<?php
require_once("conecta.php");	

function insereContato($conexao, $contato){

       $query = "insert into contato (celular, nome) values ('{$contato->celular}', '{$contato->nome}')";
    
       return mysqli_query($conexao, $query);
  }
 
function alteraContato($conexao, $contato) {
      $query = "update contato set celular='{$contato->celular}', nome='{$contato->nome}' where id = {$contato->id}"; 
       
      return mysqli_query($conexao, $query);
  }

function buscarIdContato($conexao) {
     
    $query = "SELECT MAX(id) as ultimo FROM contato";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function buscarContato($conexao, $id) {
     
    $query = "SELECT * FROM contato  where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

