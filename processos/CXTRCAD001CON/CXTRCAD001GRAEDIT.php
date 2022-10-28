<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('../../Connections/connpdo.php');
include('../../classes/ClassUsuarios.php');

$id_usuario = $_POST['id'];
$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$cpf_usuario = $_POST['cpf_usuario'];
$rua_usuario = $_POST['rua_usuario'];
$numero_rua_usuario = $_POST['numero_rua_usuario'];
$bairro_usuario = $_POST['bairro_usuario']; 
$cidade_usuario = $_POST['cidade_usuario'];
$estado_usuario = $_POST['estado_usuario'];
$complemento_rua_usuario = $_POST['complemento_rua_usuario'];
$perfil_usuario = $_POST['perfil_usuario'];
$data_nasc_usuarioBR = $_POST['data_nasc_usuario'];

$update = Usuarios::update($conn, $nome_usuario, $perfil_usuario, $email_usuario, $rua_usuario, $numero_rua_usuario, $bairro_usuario, $complemento_rua_usuario, $cidade_usuario, $estado_usuario, $data_nasc_usuarioBR, $cpf_usuario, $id_usuario);

?>