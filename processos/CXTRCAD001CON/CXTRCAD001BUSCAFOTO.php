<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('../../Connections/connpdo.php');
include('../../classes/ClassAwsLoad.php');

$id_usuario = $_POST['id_usuario'];

$busca = $conn->prepare("SELECT foto_usuario FROM usuarios WHERE id_usuario = $id_usuario");
try {
    $busca->execute();
} catch (PDOException $e) {
    $e->getMessage();
}
$row = $busca->fetch(PDO::FETCH_ASSOC);
$foto_usuario = $row['foto_usuario'];

$nome_arquivo = $id_usuario . "_foto";


$delimitador_pastas = "../../";
$pasta = "treinamento-teste";
$nome_objeto = $nome_arquivo;
$my_file_name = $foto_usuario;

$busca = AwsObjects::carregar($conn, $delimitador_pastas);



?>
<div id="div_foto">
    <div class="form-row">
        <div class="col-md-6 offset-md-3" id="div_imagem_usuario">
            <img id="imagem_usuario" src="<?php echo $my_file_name; ?>" style="width: 160px; height: 160px" alt="" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-12">
            <label>Nova Foto</label>
            <input type="file" name="files" id="nova_foto" class="form-control" multiple />
        </div>
    </div>
</div>
</div>
</div>