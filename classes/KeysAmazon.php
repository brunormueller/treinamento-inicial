<?php


class KeysAmazon
{
	public static function obterKeys($conn)
	{
		$busca = $conn->prepare("SELECT * FROM keys_amazon LIMIT 1");
		try {
			$busca->execute();
		} 
		catch (PDOException $e) {
			$e->getMessage();
		}

		if($row = $busca->fetch(PDO::FETCH_ASSOC))
		{
			return $row['access_key'] . "_?_" . $row['secret_key'] . "_?_" . $row['bucket_amazon'];
		}
		else
		{
			return false;
		} 
	}

}


?>