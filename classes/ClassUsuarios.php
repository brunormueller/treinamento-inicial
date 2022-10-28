<?php
class Usuarios
{
    public static function listar($conn, $filtro_status, $filtro_perfil, $filtro_inicio, $filtro_fim)
    {
        if ($filtro_inicio) {
            $exp_inicio = explode("/", $filtro_inicio);
            $filtro_inicioUS = $exp_inicio[2] . "-" . $exp_inicio[1] . "-" . $exp_inicio[0];
            $where_inicio = " AND dataCadastro_usuario >= '$filtro_inicioUS'";
            $possui_inicio = 1;
        } else {
            $where_inicio = "";
            $possui_inicio = 0;
        }
        if ($filtro_fim) {
            $exp_fim = explode("/", $filtro_fim);
            $filtro_fimUS = $exp_fim[2] . "-" . $exp_fim[1] . "-" . $exp_fim[0];
            $where_fim = " AND dataCadastro_usuario <= '$filtro_fimUS'";
            $possui_fim = 1;
        } else {
            $where_fim = "";
            $possui_fim = 0;
        }

        if (($possui_inicio == 1) and ($possui_fim == 1)) {
            if (strtotime($filtro_inicioUS) > strtotime($filtro_fimUS)) {
                echo "0_Filtro incio maior que filtro fim!";
                return false;
            }
        }
        if ($filtro_status) {
            $where_status = "WHERE status_usuario = $filtro_status";
        } else {
            $where_status = "WHERE status_usuario IN(0,1)";
        }
        if ($filtro_perfil) {
            $where_perfil = " AND perfil_usuario = $filtro_perfil";
        } else {
            $where_perfil = "";
        }
        $busca = $conn->prepare("
    SELECT * FROM usuarios INNER JOIN perfis ON(usuarios.perfil_usuario = perfis.id_perfil)
    $where_status
    $where_perfil
    $where_inicio
    $where_fim");

        try {
            $busca->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }
        $dados = array();

        while ($row = $busca->fetch(PDO::FETCH_ASSOC)) {


            $status_usuario = $row['status_usuario'];
            if ($status_usuario == 1) {
                $nome_status = "Ativo";
                $cor_status = "green";
            } else {
                $nome_status = "Inativo";
                $cor_status = "red";
            }

            $dadosBuscaRow = array(
                'id_usuario' => $row['id_usuario'],
                'nome_usuario' => $row['nome_usuario'],
                'nome_perfil' => $row['nome_perfil'],
                'data_nasc_usuario' => $row['data_nasc_usuario'],
                'rua_usuario' => $row['rua_usuario'],
                'numero_rua_usuario' => $row['numero_rua_usuario'],
                'bairro_usuario' => $row['bairro_usuario'],
                'email_usuario' => $row['email_usuario'],
                'cidade_usuario' => $row['cidade_usuario'],
                'estado_usuario' => $row['estado_usuario'],
                'complemento_rua_usuario' => $row['complemento_rua_usuario'],
                'cpf_usuario' => $row['cpf_usuario'],
                'nome_status' => $nome_status,
                'cor_status' => $cor_status,
            );

            array_push($dados, $dadosBuscaRow);
        }
        return $dados;
    }

    public static function obter($conn, $nome_usuario, $senha_usuario, $perfil_usuario, $email_usuario, $telefone_usuario, $rua_usuario, $numero_rua_usuario, $bairro_usuario, $complemento_rua_usuario, $cidade_usuario, $estado_usuario, $nasc_usuarioBr, $cpf_usuario, $status_usuario)
    {
        $exp_data = explode('/', $nasc_usuarioBr);
        $nasc_usuarioUs = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];

        $valida_cpf = $conn->prepare(
            "SELECT
            *
            FROM
                usuarios
            WHERE
                cpf_usuario = :cpf_usuario"

        );
        $valida_cpf->bindParam(':cpf_usuario', $cpf_usuario);
        $valida_cpf->execute();

        $valida_email = $conn->prepare(
            "SELECT
            *
            FROM
                usuarios
            WHERE
            email_usuario = :email_usuario"

        );
        $valida_email->bindParam(':email_usuario', $email_usuario);
        $valida_email->execute();

        if ($valida_cpf->rowCount() > 0) {
            echo '0_?_Já existe um cliente com este cpf!';
        }

        if ($valida_email->rowCount() > 0) {
            echo '0_?_Já existe um cliente com este email!';
        }

        $insert = $conn->prepare(
            "INSERT INTO 
                    usuarios
                    ( senha_usuario, 
                    nome_usuario, 
                    cpf_usuario,
                     email_usuario,
                      status_usuario,
                      perfil_usuario, 
                      telefone_usuario, 
                      rua_usuario, 
                      numero_rua_usuario, 
                      bairro_usuario, 
                      complemento_rua_usuario,
                       cidade_usuario, 
                       estado_usuario,
                       data_nasc_usuario)
                    VALUES
                    ( :senha_usuario, 
                    :nome_usuario,
                    :cpf_usuario,
                    :email_usuario, 
                    :status_usuario,
                     :perfil_usuario,
                      :telefone_usuario,
                       :rua_usuario, 
                       :numero_rua_usuario,
                        :bairro_usuario, 
                        :complemento_rua_usuario, 
                        :cidade_usuario, 
                        :estado_usuario,
                        :nasc_usuarioUs)"
        );

        $insert->bindParam(':senha_usuario', $senha_usuario);
        $insert->bindParam(':nome_usuario', $nome_usuario);
        $insert->bindParam(':cpf_usuario', $cpf_usuario);
        $insert->bindParam(':email_usuario', $email_usuario);
        $insert->bindParam(':status_usuario', $status_usuario);
        $insert->bindParam(':perfil_usuario', $perfil_usuario);
        $insert->bindParam(':telefone_usuario', $telefone_usuario);
        $insert->bindParam(':rua_usuario', $rua_usuario);
        $insert->bindParam(':numero_rua_usuario', $numero_rua_usuario);
        $insert->bindParam(':bairro_usuario', $bairro_usuario);
        $insert->bindParam(':complemento_rua_usuario', $complemento_rua_usuario);
        $insert->bindParam(':cidade_usuario', $cidade_usuario);
        $insert->bindParam(':estado_usuario', $estado_usuario);
        $insert->bindParam(':nasc_usuarioUs', $nasc_usuarioUs);


        try {
            $execucao = $insert->execute();
        } catch (Exception $e) {

            $execucao = $e->getMessage();
            echo  "0_?_Erro ao inserir dados!";
        }
        if ($execucao == 1) {
            echo "1_?_Atualizado com sucesso!";
        }
    }

    public static function update($conn, $nome_usuario, $perfil_usuario, $email_usuario, $rua_usuario, $numero_rua_usuario, $bairro_usuario, $complemento_rua_usuario, $cidade_usuario, $estado_usuario, $data_nasc_usuarioBR, $cpf_usuario, $id_usuario)
    {
        $exp_data = explode("/", $data_nasc_usuarioBR);
        $data_nasc_usuarioUS = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];

        $update = $conn->prepare("update usuarios set
        nome_usuario = '$nome_usuario',
        email_usuario = '$email_usuario',
        cpf_usuario = '$cpf_usuario',
        rua_usuario = '$rua_usuario',
        data_nasc_usuario = '$data_nasc_usuarioUS',
        numero_rua_usuario = '$numero_rua_usuario',
        bairro_usuario = '$bairro_usuario',
        cidade_usuario = '$cidade_usuario',
        estado_usuario = '$estado_usuario',
        complemento_rua_usuario = '$complemento_rua_usuario',
        perfil_usuario= '$perfil_usuario'
        where id_usuario = '$id_usuario'");

        try {
            $execucao = $update->execute();
        } catch (PDOException $e) {
            $execucao = $e->getMessage();
        }
        echo $execucao;
    }
}
