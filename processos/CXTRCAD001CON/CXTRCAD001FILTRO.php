<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

$user = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil_usuario'];

include('../../Connections/connpdo.php');
 include('../../classes/ClassUsuarios.php');


$filtro_perfil = $_POST['filtro_perfil'];
$filtro_status = $_POST['filtro_status'];
$filtro_inicio = $_POST['filtro_inicio'];
$filtro_fim = $_POST['filtro_fim'];


$busca = Usuarios::listar($conn, $filtro_status, $filtro_perfil, $filtro_inicio, $filtro_fim);
 
?>
<style type="text/css">
 #name {
    min-width: 137px;
  }
</style>

<table id="tab_grid" class="table table-striped-custom table-bordered" style="width:100vh">
    <thead>
        <tr>
            <th id="name">
                <center>#</center>
            </th>
            <th>
                <center>Código</center>
            </th>
            <th>
                <center>Nome</center>
            </th>
            <th>
                <center>CPF</center>
            </th>
            <th>
                <center>Perfil</center>
            </th>
            <th>
                <center>Email</center>
            </th>
            <th>
                <center>Data Nasc.</center>
            </th>
            <th>
                <center>Rua</center>
            </th>
            <th>
                <center>Número</center>
            </th>
            <th>
                <center>Bairro</center>
            </th>
            <th>
                <center>Cidade</center>
            </th>
            <th>
                <center>Estado</center>
            </th>
            <th>
                <center>Complemento</center>
            </th>
            <th>
                <center>Status</center>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $qtde_registros = count($busca);
        for ($i = 0; $i < $qtde_registros; $i++) {
        ?>
            <tr>
                <td>
                    <button type="button" id="<?php echo $busca[$i]["id_usuario"]; ?>" class="btn btn-danger btnDesativar btn-sm">

                        <i class="fa fa-close"></i>
                    </button>
                    <button type="button" id="<?php echo $busca[$i]["id_usuario"]; ?>" class="btn btn-warning btnEditar btn-sm">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" id="<?php echo $busca[$i]["id_usuario"]; ?>" class="btn btn-info btnFoto btn-sm">
                        <i class="fa fa-camera"></i>
                    </button>
                    

                </td>
                <td><?php echo $busca[$i]["id_usuario"]; ?></td>
                <td><?php echo $busca[$i]["nome_usuario"]; ?></td>
                <td><?php echo $busca[$i]["cpf_usuario"]; ?></td>
                <td><?php echo $busca[$i]["nome_perfil"]; ?></td>
                <td><?php echo $busca[$i]["email_usuario"]; ?></td>
                <td><?php echo $busca[$i]["data_nasc_usuario"]; ?></td>
                <td><?php echo $busca[$i]["rua_usuario"]; ?></td>
                <td><?php echo $busca[$i]["numero_rua_usuario"]; ?></td>
                <td><?php echo $busca[$i]["cidade_usuario"]; ?></td>
                <td><?php echo $busca[$i]["bairro_usuario"]; ?></td>
                <td><?php echo $busca[$i]["estado_usuario"]; ?></td>
                <td><?php echo $busca[$i]["complemento_rua_usuario"]; ?></td>
                <td><b>
                        <font color="<?php echo $busca[$i]["cor_status"]; ?>"><?php echo $busca[$i]["nome_status"]; ?></font>
                    </b></td>
            </tr>   
            
            <?php
            }

            ?>

    </tbody>

</table>



<script src="js/consultas/CXTRCAD001CON/CXTRCAD001ACOES.js?time=<?php echo time(); ?>"></script>