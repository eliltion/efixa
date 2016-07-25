<?php
session_start();
function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}
 
function verificaUsuario() {
  if(!usuarioEstaLogado()) {
  	 $_SESSION["danger"] = "Você não tem permissão para acessar esta página !";
     header("Location: ../index.php");
     die();
  }
}

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function logaUsuario($usuarioNome) {
  $_SESSION["usuario_logado"] = $usuarioNome;
}

function logout() {
  session_destroy();
  session_start();
  $_SESSION["success"] = "Logout realizado com sucesso"; 
}


