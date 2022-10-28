<?php
include('./classes/ClassAwsLoad.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        h1 {

            font-family: "Asap", sans-serif;
           
            margin: 10px;
        }
        .butao:hover{
background: #dee2e6;
        }

        #demo {
            height: 100%;
            position: relative;
            overflow: hidden;
        }


        .green {
            background-color: #6fb936;
        }

        .thumb {
            margin-bottom: 30px;
            display: contents;
        }

        .page-top {
            margin-top: 85px;
        }


        img.zoom {
            width: 100%;
            height: 200px;
            border-radius: 5px;
            object-fit: cover;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
        }


        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }

        .modal-header {

            border-bottom: none;
        }

        .modal-title {
            color: #000;
        }

        .modal-footer {
            display: none;
        }
    </style>
</head>

<div class="container">
    <div class="row justify-content-center">
        <h1 style="text-align:center;color:#000">Galeria de Imagens</h1>
        <div class="col-lg-8 mt-4 p-2 px-4" style="border-radius: 10px;background: #dee2e6;">

            <form action="" method="POST" enctype="multipart/form-data" id="upload_fotos">
                <br>
                <div class="form-group">
                    <div class="custom-file">
                        <label for="arquivo_amazon" class="custom-file-label">Faça aqui o upload</label>
                        <input type="file" name="file" id="file" class="form-control custom-file-input">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-block shadow" value="Upload" style="width: 100%;">
                </div>

            </form>
        </div>
    </div>
</div>

<div class="container page-top offset-2">


    <div class="row">
        <div class="col-lg-3 col-md-5 col-xs-6 thumb">
            <!-- <div class="img-fluid parent-container" id="images_preview"> -->
            <div class="img-fluid" style="display: contents;" id="images_preview">
            </div>


        </div>
    </div>
</div>

<script src="js/consultas/CXTRCAD001CON/CXAMZ002ACOES.js"></script>