<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/main.css">
    <script src="plugins/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@4.0.5/bootstrap-4/bootstrap-4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.35/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form" name="form" id="form" method="POST">
                    <span class="login100-form-title p-b-5">
                        Autenticação
                    </span>
                    

                    <div class="wrap-input100 validate-input" data-validate="Prencha seu Login">
                        <input class="input100" autocomplete="off" type="text" name="usuario" id="usuario">
                        <span class="focus-input100" data-placeholder="Login"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Digite a Senha">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="senha" id="senha">
                        <span class="focus-input100" data-placeholder="Senha"></span>
                    </div>
                    <center><img id="aguarde_login" src="img/loading.gif" style="width: 100px; height: 100px; display: none;" /></center>

                    <div class="alert alert-danger" role="alert" id="alert_erro" style="display:none;">
                        <center><b><span id="msg_erro"></span></b></center>
                    </div>

                    <div class="alert alert-danger" role="alert" id="erro_conexao" style="display:none;">
                        <center><b>Não foi possível conectar ao Servidor!</b></center>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button id="enviar" name="enviar" class="login100-form-btn">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/login/scripts.js"></script>
</html>