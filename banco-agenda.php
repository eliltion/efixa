<?php
require_once("conecta.php");	

function insereAgendamento($conexao, $agendamento){
       
       $query = "insert into agendamento (paciente_id, plano_id, data, hora) values ({$agendamento->paciente_id}, {$agendamento->plano_id}, '{$agendamento->data}', '{$agendamento->hora}')";
    
       return mysqli_query($conexao, $query);
  }
 

function alteraAgenda($conexao, $agenda) {
      $query = "update agendamento set data='{$agenda->data}', hora='{$agenda->hora}', plano_id={$agenda->plano_id}  where paciente_id = {$agenda->paciente_id}" ; 
       
      return mysqli_query($conexao, $query);
  }

function listaAgendamento($conexao) {
  $query = "select p.*, c.* from paciente as p join agendamento as c on p.id = c.paciente_id";
  $resultado =  mysqli_query($conexao, $query);
  $produtos = array();    
     
  while( $produto = mysqli_fetch_assoc($resultado) ) {
      array_push($produtos, $produto);
  }
  return $produtos;    
}

function buscaAgenda( $conexao, $id ) {
  $query = "select p.*, c.* from paciente as p join agendamento as c on p.id = c.paciente_id and p.id = {$id} ";
  $resultado =  mysqli_query($conexao, $query);    

    return mysqli_fetch_assoc($resultado);
     
}
 
function removeAgenda($conexao, $id) {
    $query = "delete from agendamento where id = {$id}";
    mysqli_query($conexao, $query);
}
