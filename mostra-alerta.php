<?php 

session_start();
function mostraAlerta($tipo) {
    if ( isset($_SESSION[$tipo] ) ) {
 ?>
      <p class="alert alert-<?=$tipo?> "><?=$_SESSION[$tipo]?> </p>

<?php  
	  // garante o escopo de flash 
	  unset($_SESSION[$tipo]);  
 
    } 
} 

