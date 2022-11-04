<?php
/*
CLASSE: AwsObjects
Envia um objeto via Put para o servidor AWS
*/

use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;


class AwsPutObjects
{
	public static function enviar($conn, $pasta, $objeto, $nome_objeto, $delimitador_pastas)
	{


		if (!class_exists("KeysAmazon")) {
			include($delimitador_pastas . "classes/KeysAmazon.php");
		}
		require $delimitador_pastas . 'vendor/autoload.php';

		$classeObterKeys = new KeysAmazon();
		$response_keys = $classeObterKeys->obterKeys($conn);
		$exp_keys = explode("_?_", $response_keys);

		$access_key = $exp_keys[0];
		$secret_key = $exp_keys[1];
		$bucket = $exp_keys[2];


		$credentials = new Aws\Credentials\Credentials($access_key, $secret_key);

		try {
			//Create a S3Client
			$s3Client = new Aws\S3\S3Client([
				'version'     => 'latest',
				'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
				'credentials' => $credentials
			]);

			if ($pasta == "") {
				//quero inserir na raiz do bucket
				$caminho = $nome_objeto;
			} else {
				$caminho = $pasta . "/" . $nome_objeto;
			}

			$result = $s3Client->putObject([
				'Bucket' => $bucket,
				'Key' => $caminho,
				'SourceFile' => $objeto,
			]);
			$insert = $conn->prepare("INSERT INTO fotos (caminho_foto) VALUES ('$caminho')");
			try {
				$insert->execute();
			} catch (PDOException $e) {
				$e->getMessage();
			}



			// $result = $s3Client->putObject([
			// 	'Bucket' => $bucket,
			// 	'Key' => $pasta . "/" . $nome_objeto,
			// 	'SourceFile' => $objeto,
			// ]);
			//'Key' => $pasta . "/" . $nome_objeto,


			$retorno = $result['ObjectURL'];
			$status = 1;
		} catch (S3Exception $e) {
			$retorno =  $e->getMessage() . "\n";
			$status = 0;
		}

		return $status . "_?_" . $retorno;
	}
	public static function download($conn, $my_file_name, $nome_objeto, $pasta, $delimitador_pastas)
	{
		$delimitador_pastas = "../../";

		if (!class_exists("KeysAmazon")) {
			include($delimitador_pastas . "classes/KeysAmazon.php");
		}
		require $delimitador_pastas . 'vendor/autoload.php';

		$classeObterKeys = new KeysAmazon();
		$response_keys = $classeObterKeys->obterKeys($conn);
		$exp_keys = explode("_?_", $response_keys);

		$access_key = $exp_keys[0];
		$secret_key = $exp_keys[1];
		$bucket = $exp_keys[2];


		$credentials = new Aws\Credentials\Credentials($access_key, $secret_key);
		try {
			$s3Client = new Aws\S3\S3Client([
				'version'     => 'latest',
				'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
				'credentials' => $credentials
			]);

			if ($pasta == "") {
				//quero inserir na raiz do bucket
				$caminho = $nome_objeto;
			} else {
				$caminho = $pasta . "/" . $nome_objeto;
			}
			$result = $s3Client->getObject([
				'Bucket' => $bucket,
				'Key'    => $caminho,
				'ResponseContentDisposition' => 'attachment; filename="' . $my_file_name . '"'
			]);
			$retorno = $result['ObjectURL'];
			$status = 1;
		} catch (S3Exception $e) {
			$retorno =  $e->getMessage() . "\n";
			$status = 0;
		}

		return $status . "_?_" . $retorno;
	}


	public static function deletar($conn, $nome_objeto, $objeto)
	{
		$classeObterKeys = new KeysAmazon();
		$response_keys = $classeObterKeys->obterKeys($conn);
		$exp_keys = explode("_?_", $response_keys);

		$access_key = $exp_keys[0];
		$secret_key = $exp_keys[1];
		$bucket = $exp_keys[2];


		$credentials = new Aws\Credentials\Credentials($access_key, $secret_key);

		$s3Client = new Aws\S3\S3Client([
			'version'     => 'latest',
			'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
			'credentials' => $credentials
		]);

		try {


			$result = $s3Client->deleteObject([
				'Bucket' => $bucket,
				'Key' => $nome_objeto,
				'SourceFile' => $objeto,
			]);

			if ($result['DeleteMarker']) {
				echo $nome_objeto . ' was deleted or does not exist.' . PHP_EOL;
			} else {
				exit('Error: ' . $nome_objeto . ' was not deleted.' . PHP_EOL);
			}
		} catch (S3Exception $e) {
			exit('Error: ' . $e->getAwsErrorMessage() . PHP_EOL);
		}
	}
}
