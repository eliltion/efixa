<?php 	
 require_once("../classes/Funcionario.php");
 require_once("../classes/Funcoes.php");
 require_once("../php/banco-funcionario.php"); 
 require_once("../php/banco-funcoes.php"); 
 require_once("../php/logica-usuario.php"); 

verificaUsuario();

$funcionario = new Funcionario();

$foto = $_FILES["foto"];
    
        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    
        // Gera um nome único para a imagem
      	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

        // Caminho de onde ficará a imagem
        $caminho_imagem = "../images/fotos/" . $nome_imagem;

        $funcionario->matricula = $_POST['matricula'];
        $funcionario->nome = $_POST['nome'];
        $funcionario->nascimento = date('Y-m-d', strtotime($_POST['nascimento']));
        $funcionario->telefone = $_POST['telefone'];
        $funcionario->email = $_POST['email'];
        $funcionario->ativo = 1;
        $funcionario->imagem = $nome_imagem;
        $funcionario->id_cargo = $_POST['id_cargo'];
        $funcionario->id_escala = $_POST['id_escala'];
        $funcionario->id_supervisao = $_POST['id_supervisao'];

    if(insereFuncionario($conexao, $funcionario)){
        
        $funcoes = new Funcoes();
        $funcoes->matricula_funcionario = $_POST['matricula'];
        
        if(array_key_exists('virador', $_POST)) {
            $funcoes->id_funcao = $_POST['virador'];
            insereFuncoes($conexao, $funcoes);
        }
        
        if(array_key_exists('empilhadeira', $_POST)) {
            $funcoes->id_funcao = $_POST['empilhadeira'];
            insereFuncoes($conexao, $funcoes);
        }
        
        if(array_key_exists('rota', $_POST)) {
            $funcoes->id_funcao = $_POST['rota'];
            insereFuncoes($conexao, $funcoes);
        }
        
        if(array_key_exists('recurso', $_POST)) {
            $funcoes->id_funcao = $_POST['recurso'];
            insereFuncoes($conexao, $funcoes);
        }
        if(array_key_exists('equipMovel', $_POST)) {
            $funcoes->id_funcao = $_POST['equipMovel'];
            insereFuncoes($conexao, $funcoes);
        }
        
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto["tmp_name"], $caminho_imagem);
        
         ?>
         <script type="text/javascript">
                    alert("Empregado <?= $funcionario->nome ?> adicionado");
                    window.location="../cadastro.php";
         </script>
        <?php
        
    }else{
        ?>
         <script type="text/javascript">
                    alert("Não entrou <?= $msg = mysqli_error($conexao);?>");
         </script>
    <?php
    }
		
