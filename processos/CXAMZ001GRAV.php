<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
$id_usuario = $_SESSION['id_usuario'];

include('../Connections/connpdo.php');
include('../classes/ClassAswsPutObject.php');


$arquivo_temporario = $_FILES['file']['tmp_name'];
$extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$delimitador_pastas = "../";
$pasta = "fotos_usuarios";
$nome_objeto = $id_usuario . "." . $extensao;

$insert = AwsPutObjects::enviar($conn, $pasta, $arquivo_temporario, $nome_objeto, $delimitador_pastas);
var_dump($insert);
