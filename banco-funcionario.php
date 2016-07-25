<?php
require_once("conecta.php");	

function insereFuncionario($conexao, $funcionario){
     $query = "insert into funcionario (matricula, nome, nascimento, telefone, email, ativo, imagem, id_escala, id_cargo, id_supervisao) values ({$funcionario->matricula},'{$funcionario->nome}','{$funcionario->nascimento}','{$funcionario->telefone}','{$funcionario->email}',{$funcionario->ativo},'{$funcionario->imagem}',{$funcionario->id_escala},{$funcionario->id_cargo},{$funcionario->id_supervisao})";
     return mysqli_query($conexao, $query);
  }

function buscaFuncionario( $conexao, $matricula ) {
    
    $query = "select * from funcionario where matricula = {$matricula}";
    $resultado = mysqli_query($conexao, $query);
    
    return mysqli_fetch_assoc($resultado);
}
 
function listaAllFuncionarios($conexao){
  $query = "select p.*, c.nome as nome_escala, d.nome as nome_cargo from funcionario as p join escala as c on p.id_escala = c.id join cargo as d on p.id_cargo = d.id";
  $resultado =  mysqli_query($conexao, $query);
  $funcionarios = array();    
     
  while($funcionario = mysqli_fetch_assoc($resultado) ) {
      array_push($funcionarios, $funcionario);
  }
  return $funcionarios;
}

function listaPerfil($conexao, $matricula){
  $query = "select p.*, c.nome as nome_escala, d.nome as nome_cargo, f.nome as nome_supervisao from funcionario as p join escala as c on p.id_escala = c.id join cargo as d on p.id_cargo = d.id join supervisao as f on p.id_supervisao = f.id and p.matricula = {$matricula}";
  $resultado =  mysqli_query($conexao, $query);
  $funcionarios = array();    
     
  while($funcionario = mysqli_fetch_assoc($resultado) ) {
      array_push($funcionarios, $funcionario);
  }
  return $funcionarios;
}

function listaFuncoes($conexao, $matricula){
  $query = "select p.*, c.nome as nome_funcao from funcoes as p join funcao as c on p.id_funcao = c.id and matricula_funcionario  = {$matricula}";
  $resultado =  mysqli_query($conexao, $query);
  $funcoes = array();    
     
  while($funcao = mysqli_fetch_assoc($resultado) ) {
      array_push($funcoes, $funcao);
  }
  return $funcoes;
}



function listaFuncionarioEscala($conexao, $folga, $idCargo){

  $query = "select matricula,nome,imagem from funcionario where id_escala <> {$folga} and id_cargo = {$idCargo}";
  $resultado =  mysqli_query($conexao, $query);
  $funcoes = array();    
     
  while($funcao = mysqli_fetch_assoc($resultado) ) {
      array_push($funcoes, $funcao);
  }
  return $funcoes;
}




function inserePacienteNovo($conexao, $paciente){
      $query = "insert into paciente (id,nome,contato_id) values ({$paciente->id},'{$paciente->nome}',{$paciente->contato_id})";
    
       return mysqli_query($conexao, $query);
  }
 
function buscarIdPaciente($conexao) {
     
    $query = "SELECT MAX(id) as ultimo FROM paciente";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}
 
function alteraPaciente($conexao, $paciente) {
      $query = "update paciente set nome='{$paciente->nome}', sexo='{$paciente->sexo}', nascimento='{$paciente->nascimento}', pai='{$paciente->pai}', mae='{$paciente->mae}', telefone='{$paciente->telefone}', endereco='{$paciente->endereco}', estado_id={$paciente->estado_id}, cidade_id={$paciente->cidade_id} where id ={$paciente->id}" ; 
       
      return mysqli_query($conexao, $query);
  }

function buscaContato( $conexao, $id ) {
    $query = "select * from contato where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
     
}

function listaAllPacientes($conexao){
  $query = "select * from paciente ORDER BY nome";
  $resultado =  mysqli_query($conexao, $query);
  $pacientes = array();    
     
  while( $paciente = mysqli_fetch_assoc($resultado) ) {
      array_push($pacientes, $paciente);
  }
  return $pacientes;
}
 
function listaProdutos($conexao) {
  $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id";
  $resultado =  mysqli_query($conexao, $query);
  $produtos = array();    
     
  while( $produto = mysqli_fetch_assoc($resultado) ) {
      array_push($produtos, $produto);
  }
  return $produtos;    
}
 
 
function removePaciente($conexao, $id) {
    $query = "delete from paciente where id = {$id}";
    mysqli_query($conexao, $query);
}