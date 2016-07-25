<?php  		
 require_once("../php/conecta.php");			
 require_once("../php/banco-paciente.php"); 

 $id = $_POST['id'];
 removePaciente($conexao, $id);
 $_SESSION['success'] = 'Paciente removido com sucesso.';
 header("Location: ../formListaPaciente.php");
 die();
 ?>
 