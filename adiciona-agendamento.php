<?php 	
 require_once("../classes/Agendamento.php");
 require_once("../php/banco-agenda.php"); 
 require_once("../php/logica-usuario.php"); 

verificaUsuario();

$agendamento = new Agendamento();

$agendamento->paciente_id = $_POST['paciente_id'];
$agendamento->plano_id = $_POST['plano_id'];
$agendamento->data = date('Y-m-d', strtotime($_POST['data']));
$agendamento->hora = $_POST['hora'];

if( insereAgendamento($conexao, $agendamento) ) { ?>
	<script type="text/javascript">
        alert("Paciente agendado com sucesso");
        window.location="../formAgendar.php";
    </script>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	<script type="text/javascript">
        alert("Paciente não agendado");
        window.location="../formAgendar.php";
    </script>
<?php
}
?>