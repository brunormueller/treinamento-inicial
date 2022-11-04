<?php
class Clientes
{
    public static function obter($conn, $nome_cliente, $email_cliente, $telefone_cliente, $rua_cliente, $numero_rua_cliente, $bairro_cliente, $complemento_rua_cliente, $cidade_cliente, $estado_cliente, $nasc_clienteBr, $cpf_cliente, $status_cliente)
    {
        $exp_data = explode('/', $nasc_clienteBr);
        $nasc_clienteUs = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];

        $valida_cpf = $conn->prepare(
            "SELECT
            *
            FROM
            clientes
            WHERE
                cpf_cliente = :cpf_cliente"

        );
        $valida_cpf->bindParam(':cpf_cliente', $cpf_cliente);
        $valida_cpf->execute();

        $valida_email = $conn->prepare(
            "SELECT
            *
            FROM
                clientes
            WHERE
            email_cliente = :email_cliente"

        );
        $valida_email->bindParam(':email_cliente', $email_cliente);
        $valida_email->execute();

        if ($valida_cpf->rowCount() > 0) {
            echo '0_?_Já existe um cliente com este cpf!';
        }

        if ($valida_email->rowCount() > 0) {
            echo '0_?_Já existe um cliente com este email!';
        }

        $insert = $conn->prepare(
            "INSERT INTO 
                    clientes
                    ( 
                    nome_cliente, 
                    cpf_cliente,
                     email_cliente,
                      status_cliente, 
                      telefone_cliente, 
                      rua_cliente, 
                      numero_rua_cliente, 
                      bairro_cliente, 
                      complemento_rua_cliente,
                       cidade_cliente, 
                       estado_cliente,
                       data_nasc_cliente)
                    VALUES
                    ( 
                    :nome_cliente,
                    :cpf_cliente,
                    :email_cliente, 
                    :status_cliente,
                     
                      :telefone_cliente,
                       :rua_cliente, 
                       :numero_rua_cliente,
                        :bairro_cliente, 
                        :complemento_rua_cliente, 
                        :cidade_cliente, 
                        :estado_cliente,
                        :nasc_clienteUs)"
        );


        $insert->bindParam(':nome_cliente', $nome_cliente);
        $insert->bindParam(':cpf_cliente', $cpf_cliente);
        $insert->bindParam(':email_cliente', $email_cliente);
        $insert->bindParam(':status_cliente', $status_cliente);

        $insert->bindParam(':telefone_cliente', $telefone_cliente);
        $insert->bindParam(':rua_cliente', $rua_cliente);
        $insert->bindParam(':numero_rua_cliente', $numero_rua_cliente);
        $insert->bindParam(':bairro_cliente', $bairro_cliente);
        $insert->bindParam(':complemento_rua_cliente', $complemento_rua_cliente);
        $insert->bindParam(':cidade_cliente', $cidade_cliente);
        $insert->bindParam(':estado_cliente', $estado_cliente);
        $insert->bindParam(':nasc_clienteUs', $nasc_clienteUs);


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

    public static function update($conn, $nome_cliente, $email_cliente, $rua_cliente, $numero_rua_cliente, $bairro_cliente, $complemento_rua_cliente, $cidade_cliente, $estado_cliente, $data_nasc_clienteBR, $cpf_cliente, $id_cliente)
    {
        $exp_data = explode("/", $data_nasc_clienteBR);
        $data_nasc_clienteUS = $exp_data[2] . "-" . $exp_data[1] . "-" . $exp_data[0];

        $update = $conn->prepare("update clientes set
        nome_cliente = '$nome_cliente',
        email_cliente = '$email_cliente',
        cpf_cliente = '$cpf_cliente',
        rua_cliente = '$rua_cliente',
        data_nasc_cliente = '$data_nasc_clienteUS',
        numero_rua_cliente = '$numero_rua_cliente',
        bairro_cliente = '$bairro_cliente',
        cidade_cliente = '$cidade_cliente',
        estado_cliente = '$estado_cliente',
        complemento_rua_cliente = '$complemento_rua_cliente',
        where id_cliente = '$id_cliente'");

        try {
            $execucao = $update->execute();
        } catch (PDOException $e) {
            $execucao = $e->getMessage();
        }
        echo $execucao;
    }
}
