<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('../../Connections/connpdo.php');

$id_usuario = $_POST['id_usuario'];


$busca = $conn->prepare("SELECT * FROM usuarios WHERE id_usuario = $id_usuario");
try {
    $busca->execute();
} catch (PDOException $e) {
    $e->getMessage();
}

$row = $busca->fetch(PDO::FETCH_ASSOC);

$status_usuario =$row['status_usuario'];
$novo_status_usuario =$status_usuario ? 0 : 1;

$update =$conn-> prepare("UPDATE usuarios SET status_usuario = :status_usuario WHERE id_usuario = :id_usuario");
$update->bindParam(':status_usuario', $novo_status_usuario);
$update->bindParam(':id_usuario', $id_usuario);
$update->execute();


?>



<form action="#" name="form_edit" id="form-edit" method="post">

    
</form>