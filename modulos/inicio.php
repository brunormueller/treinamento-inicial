<?php



if ($_SESSION['logado'] == 1) {
?>

    <head>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
    <div class="container" style="margin-top: 12%;">
        <div class="row">
            <div class="col-md-12">

                <form action="" class="form-control mt-4 h-100" style="text-align: center;">
                    <h2 class="title">Cadastro de Clientes</h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <a href="CXTRCAD001CON"><button class="form-control shadow btn btn-primary mb-3 mt-4" type="button"><b>Consulta</b></button></a>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <a href="logout"><button class="form-control btn btn-danger shadow" type="button">Deslogar</button></a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php
} else {
    header("location:403");
}

?>