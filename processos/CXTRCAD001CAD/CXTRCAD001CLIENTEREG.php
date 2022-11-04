<?php
include('../../Connections/connpdo.php');
include('../../classes/ClassClientes.php');


$nome_cliente = $_POST['nome_cliente'];
$email_cliente = $_POST['email_cliente'];
$telefone_cliente = $_POST['telefone'];
$rua_cliente = $_POST['rua'];
$numero_rua_cliente = $_POST['numero'];
$bairro_cliente = $_POST['bairro'];
$complemento_rua_cliente = $_POST['complemento'];
$cidade_cliente = $_POST['cidade'];
$estado_cliente = $_POST['estado'];
$nasc_clienteBr = $_POST['nascimento'];
$exp_data = explode('/', $nasc_clienteBr);
$nasc_clienteUs = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];
$cpf_cliente = $_POST['cpf_cliente'];
$status_cliente = 1;


$insert = Clientes::obter($conn, $nome_cliente, $email_cliente, $telefone_cliente, $rua_cliente, $numero_rua_cliente, $bairro_cliente, $complemento_rua_cliente, $cidade_cliente, $estado_cliente, $nasc_clienteBr, $cpf_cliente, $status_cliente);


var_dump($insert);
