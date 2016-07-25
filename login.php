<?php
  require_once("banco-usuario.php");
  require_once("logica-usuario.php");
   
   $usuario = buscaUsuario($conexao, $_POST["matricula"], $_POST["senha"]);

   if ($usuario != null) {
       
       if($usuario['id_perfil'] == 1){
   	   logaUsuario($usuario["nome"]);     //($_POST["email"]);
       $_SESSION["success"] = "Login realizado com sucesso !";
    
       header("Location: ../home.php"); // se for 1 abra como secretária caso contrario abre perfil médico
       }else{
           logaUsuario($usuario["nome"]);     //($_POST["email"]);
           $_SESSION["success"] = "Login realizado com sucesso !";
    
       header("Location: ../layout.php");
       }
   
   } else {
       $_SESSION["danger"] = "Autenticação falhou !";

       header("Location: ../Pages.html");
   }
   die();
?>
