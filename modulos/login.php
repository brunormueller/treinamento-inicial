<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title> - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/login/util.css">
    <link rel="stylesheet" type="text/css" href="css/login/main.css"> -->
    <!-- <script src="plugins/jquery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@4.0.5/bootstrap-4/bootstrap-4.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.35/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <!--===============================================================================================-->
</head>

<body class="bg-gradient-primary">


    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Autenticação</h1>
                                    </div>

                                    <form class="user" name="form" id="form" method="POST">



                                        <div class="form-group">
                                            <input class="form-control form-control-user" autocomplete="off" type="text" placeholder="Digite seu usuário" name="usuario" id="usuario">

                                        </div>

                                        <div class="form-group" data-validate="Digite a Senha">

                                            <input class="form-control form-control-user" type="password" placeholder="Digite sua senha" name="senha" id="senha">

                                        </div>
                                        <center><img id="aguarde_login" src="img/loading.gif" style="width: 100px; height: 100px; display: none;" /></center>

                                        <div class="alert alert-danger" role="alert" id="alert_erro" style="display:none;">
                                            <center><b><span id="msg_erro"></span></b></center>
                                        </div>

                                        <div class="alert alert-danger" role="alert" id="erro_conexao" style="display:none;">
                                            <center><b>Não foi possível conectar ao Servidor!</b></center>
                                        </div>


                                        <button id="enviar" name="enviar" class="btn btn-primary btn-user btn-block">
                                            Entrar
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="CXTRCAD001CADR">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="js/login/scripts.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>