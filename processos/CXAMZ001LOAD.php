<?php
include('../Connections/connpdo.php');
  include('../classes/ClassAwsLoad.php');

  date_default_timezone_set('America/Sao_Paulo');

  $pasta = "fotos_usuarios";
  $delimitador_pastas = '../';


  $retornoEnvio = AwsObjects::carregar($conn, $delimitador_pastas);
 
  echo $retornoEnvio;
  
?>