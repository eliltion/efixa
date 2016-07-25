<?php 	
 require_once("../classes/Paciente.php");
 require_once("../classes/Contato.php");
 require_once("../php/banco-paciente.php"); 
 require_once("../php/banco-contato.php"); 
 require_once("../php/logica-usuario.php"); 

verificaUsuario();

$paciente = new Paciente();

$paciente->id = $_POST['id'];
$paciente->nome = $_POST['nome'];
$paciente->sexo = $_POST['sexo'];
$paciente->nascimento = date('Y-m-d', strtotime($_POST['nascimento']));
$paciente->pai = $_POST['pai'];
$paciente->mae = $_POST['mae'];
$paciente->telefone = $_POST['telefone'];
$paciente->endereco = $_POST['endereco'];
$paciente->estado_id = $_POST['estado_id'];
$paciente->cidade_id = $_POST['cidade_id'];


if( alteraPaciente($conexao, $paciente) ) { 
        
        $idContato = buscarContato($conexao, $_GET['idC']); 
        
        $contato = new Contato();
        $contato->id = $idContato['id'];
        $contato->celular = $_POST['celular'];
        $contato->nome = $_POST['responsavel'];
            
            if(alteraContato($conexao, $contato)){ ?>
                <script type="text/javascript">
                    alert("Paciente <?=$paciente->nome?> alterado com sucesso");
                    window.location="../formListaPaciente.php";
                </script>
            <?php }else {
                
	           $msg = mysqli_error($conexao);
            ?>
                <script type="text/javascript">
                    alert("Paciente <?= $msg = mysqli_error($conexao);?> não alterado");
                </script>
<?php
    }
}
?>
