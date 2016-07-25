<?php  		
 require_once("../php/conecta.php");			
 require_once("../php/banco-agenda.php"); 

 $id = $_POST['id'];

 removeAgenda($conexao, $id);

 $_SESSION['success'] = 'Agendamento cancelado com sucesso.';
 ?>
 
 <script type="text/javascript">
            alert("Paciente Removido ");
            window.location="../formAgendar.php";
 </script>
<?php
 header("Location: ../formAgendamento.php");
 die();
 ?>