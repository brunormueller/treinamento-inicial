<?php
include('../Connections/connpdo.php');
include('../classes/ClassAwsDelete.php');

date_default_timezone_set('America/Sao_Paulo');
session_start();
$extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$id_usuario = $_SESSION['id_usuario'];
$pasta = "fotos_usuarios";
$delimitador_pastas = '../';
$nome_objeto = $id_usuario . "." . $extensao;


$delete = AwsDeleteObject::delete($conn, $pasta, $nome_objeto, $delimitador_pastas);
$delete =AwsDeleteObject::deleteBD($conn,$pasta,$nome_objeto);

var_dump($delete);
 