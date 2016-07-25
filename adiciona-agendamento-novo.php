<?php 	
 require_once("../classes/Agendamento.php");
 require_once("../classes/Paciente.php");
 require_once("../php/banco-paciente.php");
 require_once("../classes/Contato.php");
 require_once("../php/banco-agenda.php");
 require_once("../php/banco-contato.php"); 
 require_once("../php/logica-usuario.php");
 require_once("../php/conecta.php"); 

verificaUsuario();


$contato = new Contato();

$contato->celular = $_POST['telefone'];
$contato->nome = $_POST['responsavel'];

if( insereContato($conexao, $contato) ) { 
    
    $query = "SELECT MAX(id) as ma FROM contato";
    $resultado = mysqli_query($conexao, $query);
    $id = mysqli_fetch_assoc($resultado);
    
    $idMax = buscarIdPaciente($conexao);
    
    $paciente = new Paciente();
    
    $paciente->id = $idMax['ultimo']+1;
    $paciente->nome = $_POST['nome'];
    $paciente->contato_id = $id['ma'];
    
    if(inserePacienteNovo($conexao, $paciente)){
    
    $agendamento = new Agendamento();
        
    $agendamento->paciente_id = $paciente->id;
    $agendamento->plano_id = $_POST['plano_id'];
    $agendamento->data = $_POST['data'];
    $agendamento->hora = $_POST['hora'];
        
       if( insereAgendamento($conexao, $agendamento) ) { ?>
             <script type="text/javascript">
                    alert("Paciente <?= $paciente->nome?> agendado com sucesso");
                     window.location="../formAgendar.php";
            </script>
<?php } else {
	$msg = mysqli_error($conexao);
?>
	 <script type="text/javascript">
            alert("Agendamento <?= $msg = mysqli_error($conexao);?> não agendado");
    </script>
<?php
}
    } else { ?>
        <script type="text/javascript">
            alert("Agend <?= $msg = mysqli_error($conexao);?> não agendado");
    </script>
    <?php
}
           }
?>

          
