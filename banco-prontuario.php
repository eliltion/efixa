<?php 	

 require_once("conecta.php");	

 require_once("php/logica-usuario.php"); 

verificaUsuario();
   
   function buscaProntuario($conexao, $id) {
    $query = "select * from prontuario where paciente_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
       
       return mysqli_fetch_assoc($resultado);
       
     
}