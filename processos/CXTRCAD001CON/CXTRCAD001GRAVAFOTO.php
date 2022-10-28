<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();
include('../../Connections/connpdo.php');
include('../../classes/ClassAswsPutObject.php');

$id_usuario = $_POST['id_usuario'];

$pasta = "../../fotos_usuarios/";
$pasta_bd = "fotos_usuarios/";
$nome_arquivo = $id_usuario . "_foto";




if (isset($_FILES['file']) and ($_FILES['file']['size'] > 0)) {

    $is_file = 1;
    $verifica_extensao = 0;
    $temporary = explode(".", $_FILES['file']['name']);
    $file_extension = end($temporary);

    if ($file_extension != "jpg" && $file_extension != "jpeg" && $file_extension != "JPG" && $file_extension != "JPEG" && $file_extension != "png" && $file_extension != "PNG") {
        $verifica_extensao = 1;
    }

    if ($verifica_extensao == 1) {
        $msg = "Insira imagens do tipo JPG ou PNG!";
        echo "0_" . $msg;
        return false;
    } else {

        $arquivo_temporario = $_FILES['file']['tmp_name'];
        $extensao = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $caminho_destino = $pasta . $nome_arquivo . "." . $extensao;

        $delimitador_pastas = "../../";
        $pasta = "treinamento-teste";
        $nome_objeto = $nome_arquivo . "." . $extensao;
     
        //$objeto = $_FILES['file']['tmp_name'];

        $insert = AwsObjects::enviar($conn, $pasta, $arquivo_temporario, $nome_objeto, $delimitador_pastas);

        // var_dump($insert);
        // die();

        if (move_uploaded_file($arquivo_temporario, $caminho_destino)) {



            $caminho_bd = $pasta_bd . $nome_arquivo . "." . $extensao;

            $busca_foto = $conn->prepare("
            SELECT foto_usuario FROM usuarios WHERE id_usuario = $id_usuario
        ");
            try {
                $busca_foto->execute();
            } catch (PDOException $e) {
                $e->getMessage();
            }
            $row_foto = $busca_foto->fetch(PDO::FETCH_ASSOC);
            $caminho_foto = $row_foto['foto_usuario'];
            if ($caminho_foto) {
                $exp = explode(".", $caminho_foto);
                $extensao_bd = $exp[1];
            } else {
                $extensao_bd = $extensao;
                $caminho_foto = false;
            }

            if (($caminho_foto == false) or ($extensao_bd != $extensao)) {

                // if ($extensao_bd != $extensao) {
                //     unlink("../../" . $caminho_foto);
                // }
                $grava_foto = $conn->prepare("
            UPDATE usuarios SET foto_usuario = '$caminho_bd' WHERE id_usuario = $id_usuario;
        ");


                try {
                    $gravacao_foto = $grava_foto->execute();
                } catch (PDOException $e) {
                    $gravacao_foto = $e->getMessage();
                }
            }
            echo 1 . "_?_" . $caminho_bd;
        } else {
            //tratativa de erro de mover o arquivo
            echo "_?_" . $_FILES['file']['name'] . " não carregado!";
        }
    }
} else {
    echo "erro_Não existe arquivos carregados!";
}
