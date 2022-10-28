<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.35/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div id="div_cad">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row justify-content-center">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Cadastro</h1>
                                </div>
                                <input type="hidden" name="id" id="id">

                                <form action="" class="needs-validation user" method="POST" id="form_usuario">
                                    <div class="form-group row">
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Nome</label>
                                            <input type="text" id="nome_usuario" name="nome_usuario" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">CPF</label>
                                            <input type="text" id="cpf_usuario" name="cpf_usuario" class="form-control form-control-user obrigatorios" oninput="mascara(this)" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Login</label>
                                            <input type="text" id="login" name="login" class="form-control form-control-user obrigatorios" required>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="">Perfil</label>
                                            <select name="perfil" id="perfil" class="form-control form-control-user obrigatorios" required>
                                                <option class="form-control" value="">Selecione uma Opcão</option>
                                                <option class="form-control" value="1">Administrador</option>
                                                <option class="form-control" value="2">Vendedor</option>
                                            </select>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Senha</label>
                                            <input type="password" id="senha" name="senha" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="">Confirmação de Senha</label>
                                            <input type="password" id="confirmSenha" name="confirmSenha" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>

                                    </div>
                                    <div class="form-group row mb-3 mb-sm-3">
                                        <div class="col-sm-12">
                                            <label for="">Email</label>
                                            <input type="email" id="email_usuario" name="email_usuario" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                    </div>
                                    <div class=" form-group row">

                                        <div class="col-sm-4">
                                            <label for="">Telefone</label>
                                            <input type="text" id="telefone" name="telefone" oninput="mascaraFone(this)" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Rua</label>
                                            <input type="text" id="rua" name="rua" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="">Numero</label>
                                            <input type="text" id="numero" name="numero" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="">Bairro</label>
                                            <input type="text" id="bairro" name="bairro" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="">Cidade</label>
                                            <input type="text" id="cidade" name="cidade" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="">Estado</label>
                                            <input type="text" id="estado" name="estado" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Complemento</label>
                                            <input type="text" id="complemento" name="complemento" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Nascimento</label>
                                            <input type="text" id="nascimento" name="nascimento" class="form-control form-control-user obrigatorios" required>
                                            <div class="invalid-feedback">Preencha o campo!</div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3">

                                            <a href="login"><button class="btn btn-warning btn-user btn-block" type="button" style="width: 100%;" name="backLogin">Voltar para Login</button></a>
                                        </div>
                                        <div class="col-md-3">

                                            <button @click="cadastrarForm()" type="submit" class="btn btn-primary btn-user btn-block" id="btnRegistrar" style="width: 100%;">Salvar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

<script src="js/consultas/CXTRCAD001CON/CXTRCAD001CAD.js?time=<?php echo time(); ?>"></script>

</html>