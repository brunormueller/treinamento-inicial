<?php

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class AwsObjects
{
	public static function send($conn, $pasta, $objeto, $nome_objeto, $delimitador_pastas)
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
			$s3Client = new Aws\S3\S3Client([
				'version'     => 'latest',
				'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
				'credentials' => $credentials
			]);
			if ($pasta == "") {
				$caminho = $nome_objeto;
			} else {
				$caminho = $pasta . "/" . $nome_objeto;
			}
			$result = $s3Client->putObject([
				'Bucket' => $bucket,
				'Key' => $caminho, //pasta do bucket + nome do arquivo
				'SourceFile' => $objeto, //caminho fonte do arquivo a ser upado
			]);

			$insert = $conn->prepare("INSERT INTO fotos (caminho_foto) VALUES ('$caminho');");
			try {
				$insert->execute();
			} catch (PDOException $e) {
				$e->getMessage();
			}

			$retorno = $result['ObjectURL'];
			$status = 1;
		} catch (S3Exception $e) {
			$retorno =  $e->getMessage() . "\n";
			$status = 0;
		}

		return $status . "_?_" . $retorno;
	}
	public static function carregar($conn, $delimitador_pastas)
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

			$busca = $conn->prepare("SELECT * FROM fotos ORDER BY id_foto DESC");

			try {
				$busca->execute();
			} catch (PDOException $e) {
				$e->getMessage();
			}

			$data = '';

			while ($row = $busca->fetch(PDO::FETCH_ASSOC)) {

				$caminho = $row['caminho_foto'];

				$cmd = $s3Client->getCommand('GetObject', [
					'Bucket' => $bucket,
					'Key' => $caminho
				]);

				$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

				$presignedUrl = (string)$request->getUri();

				$data .= '
				<a href="' . $presignedUrl . '" onclick="magnific()" class="fancybox" rel="ligthbox">
					<img src="' . $presignedUrl . '" class="file" id="'. $caminho .'" name="file" style="width: 300px;height:300px; margin:10px;border-radius: 7px;"  alt="">		
				</a>
				<div class="dropdown" style="right: 64px;top: 16px;">
                <button class="btn dropdown-toggle butao" type="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="' . $presignedUrl . '">Baixar Imagem</a></li>
                    <li><a class="dropdown-item" id="deleteBtn" onclick="delete_images()" href="" name="delete">Apagar foto</a></li>
                </ul>
            </div>
			
				';
			}
			return ($data);
		} catch (S3Exception $e) {
			$e->getMessage();
		}
	}
}
