<?php 	
 require_once("banco-teste.php"); 
 require_once("logica-usuario.php");
 require_once("busca-escala.php");




$dataFim = $_POST['dataCalcula'];
$folga = recuperaData($conexao, $dataFim); 


