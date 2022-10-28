<?php
include('../../Connections/connpdo.php');
include('../../classes/ClassUsuarios.php');
include('../../classes/ClassAswsPutObject.php');

$nome_usuario = $_POST['nome_usuario'];
$senha_usuario = $_POST['senha'];
$perfil_usuario = $_POST['perfil'];
$email_usuario = $_POST['email_usuario'];
$telefone_usuario = $_POST['telefone'];
$rua_usuario = $_POST['rua'];
$numero_rua_usuario = $_POST['numero'];
$bairro_usuario = $_POST['bairro'];
$complemento_rua_usuario = $_POST['complemento'];
$cidade_usuario = $_POST['cidade'];
$estado_usuario = $_POST['estado'];
$nasc_usuarioBr = $_POST['nascimento'];
$exp_data = explode('/', $nasc_usuarioBr);
$nasc_usuarioUs = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];
$cpf_usuario = $_POST['cpf_usuario'];
$status_usuario = 1;

$delimitador_pastas = "../../";
$pasta = "treinamento-teste";
$nome_objeto = "testes_treinamento";
$objeto = $_FILES["fileToUpload"]['tmp_name'];

$insert = AwsObjects::enviar($conn, $pasta, $objeto, $nome_objeto, $delimitador_pastas);
$insert = Usuarios::obter($conn, $nome_usuario, $senha_usuario, $perfil_usuario, $email_usuario, $telefone_usuario, $rua_usuario, $numero_rua_usuario, $bairro_usuario, $complemento_rua_usuario, $cidade_usuario, $estado_usuario, $nasc_usuarioBr, $cpf_usuario, $status_usuario);


var_dump($insert);
