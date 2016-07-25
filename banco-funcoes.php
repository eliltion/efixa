<?php
require_once("conecta.php");	

function insereFuncoes($conexao, $funcoes){
     $query = "insert into funcoes (matricula_funcionario, id_funcao ) values ({$funcoes->matricula_funcionario},{$funcoes->id_funcao})";
     return mysqli_query($conexao, $query);
  }
