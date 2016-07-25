<?php 	
 require_once("../classes/Paciente.php");
 require_once("../classes/Agendamento.php");
 require_once("../php/banco-paciente.php"); 
 require_once("../php/banco-plano.php"); 
 require_once("../php/banco-agenda.php"); 
 require_once("../php/logica-usuario.php"); 

verificaUsuario();



$agendamento = new Agendamento();

$agendamento->paciente_id = $_POST['matricula'];
$agendamento->plano_id = $_POST['plano_id'];
$agendamento->data = date('Y-m-d', strtotime($_POST['data']));
$agendamento->hora = $_POST['hora'];


if( alteraAgenda($conexao, $agendamento) ) { ?>
        
    <script type="text/javascript">
        alert("Agenda alterada com sucesso");
        window.location="../formAgendamento.php";
    </script>
            <?php }else {
                
	           $msg = mysqli_error($conexao);
            ?>
                <script type="text/javascript">
                    alert("Agenda <?= $msg = mysqli_error($conexao);?> não alterada");
                </script>
<?php
    }
?>