<?php
include("../../Connections/connpdo.php");
session_start();
if ((isset($_POST['usuario'])) and ($_POST['senha'])) {
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes(md5($_POST['senha']));

	$busca = $conn->prepare(" 
        SELECT * FROM usuarios 
        WHERE login_usuario = '$usuario'
        AND senha_usuario = '$senha'
    ");
	try {
		$execucao = $busca->execute();
	} 
	catch (PDOException $e) {
		$execucao = $e->getMessage();
	}
   
    if($execucao == 1) {

        if($busca->rowCount() === 0) {
            echo "0_?_Login ou Senha Incorretos!";
        }
        else {

            $row_usuario = $busca->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $row_usuario['id_usuario'];
            $nome_usuario = $row_usuario['nome_usuario'];
            $perfil_usuario = $row_usuario['perfil_usuario'];
            $status_usuario = $row_usuario['status_usuario'];
              
            if($status_usuario == 0) {
                echo "0_?_Usuário Inativo!";
            }
            else {
                    $_SESSION['id_usuario'] = $id_usuario;
                    $_SESSION['nome_usuario'] = $nome_usuario;
                    $_SESSION['perfil_usuario'] = $perfil_usuario;
                    $_SESSION['status_usuario'] = $status_usuario;
                    $_SESSION['nome_sistema'] = "Sistema de Treinamento";
                    $_SESSION['logado'] = 1;


                echo "1_?_Logado!";
            }
        }

    }
    else {
        echo "0_?_" . $execucao;
    }

} else {
    echo "0_?_Não existe Usuário ou Senha!";
}
