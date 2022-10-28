<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('../../Connections/connpdo.php');
include('../../classes/ClassUsuarios.php');

$id_usuario = $_POST['id_usuario'];
$busca = $conn->prepare("SELECT * FROM usuarios INNER JOIN perfis ON usuarios.perfil_usuario = perfis.id_perfil WHERE id_usuario = $id_usuario");
try {
    $busca->execute();
} catch (PDOException $e) {
    $e->getMessage();
}

$row = $busca->fetch(PDO::FETCH_ASSOC);
$nome_usuario = $row['nome_usuario'];
$email_usuario = $row['email_usuario'];
$cpf_usuario = $row['cpf_usuario'];
$data_nasc_usuario = $row['data_nasc_usuario'];
$rua_usuario = $row['rua_usuario'];
$numero_rua_usuario = $row['numero_rua_usuario'];
$bairro_usuario = $row['bairro_usuario'];
$email_usuario = $row['email_usuario'];
$cidade_usuario = $row['cidade_usuario'];
$estado_usuario = $row['estado_usuario'];
$complemento_rua_usuario = $row['complemento_rua_usuario'];
$nome_perfil = $row['nome_perfil'];
?>
<form class="needs-validation" action="#" name="form_edit" id="form-edit" method="post">


    <input type="hidden" name="id" id="id" value="<?php echo $id_usuario; ?>" />
    <div class="form-row">
        <div class="col-md-3">
            <label for="">Nome</label>
            <input type="text" required name="nome_usuario" id="nome_usuario" class="form-control obrigatorios" placeholder="<?php echo $nome_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-3">
            <label class="label_titulos">Perfil</label>
            <select name="perfil_usuario" id="perfil_usuario" class="form-control obrigatorios">
                <?php
                $busca_perfis = $conn->prepare("SELECT * FROM perfis WHERE status_perfil= 1 ");
                try {
                    $busca_perfis->execute();
                } catch (PDOException $e) {
                    $e->getMessage();
                }

                while ($row_perfil = $busca_perfis->fetch(PDO::FETCH_ASSOC)) {
                    $id_perfil = $row_perfil['id_perfil'];
                    $nome_perfil = $row_perfil['nome_perfil'];

                    if ($id_perfil == $perfil_usuario) {
                        $selected_perfil = "selected";
                    } else {
                        $selected_perfil = "";
                    }
                ?>
                    <option <?php echo $selected_perfil; ?> value="<?php echo $id_perfil; ?>"><?php echo $nome_perfil; ?></option>
                <?php
                }
                ?>


            </select>

        </div>
        <div class="col-md-3" id="validaCPF">
            <label for="">CPF</label>
            <input required type="text" id="cpf_usuario" name="cpf_usuario" class="form-control obrigatorios" onchange="existe()" data-val-required="O campo Razão Social é obrigatório." oninput="mascara(this)">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-3">
            <label for="">Data de nascimento</label>
            <input required type="text" name="data_nasc_usuario" id="data_nasc_usuario" class="form-control obrigatorios" oninput="mascaraDate(this)">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Email</label>
            <input required type="email" name="email_usuario" id="email_usuario" class="form-control obrigatorios">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>

        <div class=" col-md-6 mt-2">
            <label for="">Rua</label>
            <input required type="text" required name="rua_usuario" id="rua_usuario" class="form-control obrigatorios" value="<?php echo $rua_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Numero da Rua</label>
            <input required type="text" name="numero_rua_usuario" id="numero_rua_usuario" class="form-control obrigatorios" value="<?php echo $numero_rua_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Bairro</label>
            <input required type="text" required name="bairro_usuario" id="bairro_usuario" class="form-control obrigatorios" value="<?php echo $bairro_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Cidade</label>
            <input required type="text" required name="cidade_usuario" id="cidade_usuario" class="form-control obrigatorios" value="<?php echo $cidade_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>
        <div class="col-md-6 mt-2">
            <label for="">Estado</label>
            <!-- <input type="text" name="estado_usuario" id="estado_usuario" class="form-control-obrigatorios" value="<?php echo $estado_usuario; ?>"> -->
            <select name="estado_usuario" id="estado_usuario" class="form-control obrigatorios">
                <option value="<?php echo $estado_usuario; ?>"><?php echo $estado_usuario; ?></option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select>
        </div>
        <div class="col-md-12 mt-2">
            <label for="">Complemento Rua</label>
            <input required type="text" name="complemento_rua_usuario" id="complemento_rua_usuario" class="form-control obrigatorios" value="<?php echo $complemento_rua_usuario; ?>">
            <div class="invalid-feedback">Preencha o campo!</div>
        </div>

    </div>

</form>

<script src="js/consultas/CXTRCAD001CON/CXTRCAD001EDITAR.js"></script>