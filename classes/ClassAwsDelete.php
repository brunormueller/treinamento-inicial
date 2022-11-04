<?php

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class AwsDeleteObject
{
	public static function delete($conn, $caminho, $delimitador_pastas)
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
		//$caminho = $pasta . "/" . $nome_objeto;
		try {
			//Create a S3Client
			$s3Client = new Aws\S3\S3Client([
				'version'     => 'latest',
				'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
				'credentials' => $credentials
			]);

			$result  = $s3Client->deleteObject([
				'Bucket' => $bucket,
				'Key' => $caminho, //pasta do bucket + nome do arquivo
				// 'SourceFile' => $objeto  //caminho fonte do arquivo a ser upado
			]);


			$retorno = $result['ObjectURL'];
			$status = 1;
		} catch (S3Exception $e) {
			$retorno =  $e->getMessage() . "\n";
			$status = 0;
		}

		if ($status == 1) {
			$removeBD = $conn->prepare("DELETE FROM fotos WHERE caminho_foto = ('$caminho')");
			try {
				$removeBD->execute();
			} catch (PDOException $e) {
				$removeBD = $e->getMessage();
			}
			return $removeBD;
		}
		return $status . "_?_" . $retorno;
	}
	// public static function deleteBD($conn,$pasta,$nome_objeto){
	// 	$caminho = $pasta . "/" . $nome_objeto;





}
