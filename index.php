<?php
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
session_start();

require("classes/Url.php");
require_once("classes/TempoSessao.php");

$modulo = Url::getURL(0);



?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="icon" type="image/png" href="assets/images/favicon.png" />

	<!--- Overflow da visibilidade da seleção de colunas (Export - Colunas Visiveis/Não visiveis) das consultas !--->
	<style>
		div.dt-button-collection {
		max-height: 300px;
		overflow-y: auto;
		}
	</style>
</head>
<?php
if ($modulo == null) {
	require "/login";
} else {
	if (file_exists("modulos/" . $modulo . ".php")) {
		require "modulos/" . $modulo . ".php";
	
	} else {
		if ($modulo != 'processos' && $modulo != 'js')

			require "modulos/404.php";
	}
}
?>

<script src="js/redrawElements.js"></script>
<script src="js/enterTab.js"></script>
<?php
$url = $_SERVER['SERVER_NAME'];

if (($modulo != 'login') AND ($url != "localhost")) {
	echo '<script src="js/verificaSessao.js"></script>';
	echo '<script src="js/atualizaTempoSessao.js"></script>';
}
?>