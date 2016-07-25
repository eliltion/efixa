<?php 	
 require_once("banco-teste.php"); 
 require_once("logica-usuario.php"); 

verificaUsuario();


function recuperaData($conexao, $dataFim){
$datas = buscaData($conexao);

foreach($datas as $data) {
    $dias = calculaDias($conexao, $dataFim, $data['data']);

    if (($dias['dias'] % 8) == 0){
        $trabalha = "Não Trabalha";
        $folga = $data['id'];
        
    }else{
         $diasSomaUm = gmp_div_r($dias['dias'], 8);
         $diasMaisUm = gmp_strval($diasSomaUm);
            
            if($diasMaisUm/8 == 0.125){
                $trabalha = "Não Trabalha";
                $folga = $data['id'];
            }else{
                $trabalha = "Trabalha"; 
            }
    }
    
}
    return $folga;
    
}

 ?>
        <!-- <script type="text/javascript">
             
                  alert("Dias = <?=$dias['dias']?> - Resto = <?=$diasMaisUm?>  - Escala = <?=$data['nome']?> - <?=$trabalha?>");
         </script>-->
        <?php