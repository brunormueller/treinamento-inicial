<?php
include('../Connections/connpdo.php');
include('../classes/ClassAwsDelete.php');

date_default_timezone_set('America/Sao_Paulo');
session_start();
//$extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$id_usuario = $_SESSION['id_usuario'];
//$pasta = "fotos_usuarios";
$caminho = $_POST['file'];
$delimitador_pastas = '../';
//$nome_objeto = $id_usuario . ".jpg";


$delete = AwsDeleteObject::delete($conn, $caminho, $delimitador_pastas);
//$deleteBD =AwsDeleteObject::deleteBD($conn,$pasta,$nome_objeto);

echo ($delete);
