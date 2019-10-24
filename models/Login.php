<?php
class LoginModel extends Models // HEREDA DEL ARCHIVO MODELS QUE ESTA EN LA CARPETA LIBRARIES (REVISAR ES CORTO)
{
	public function __construct()
	{
		parent::__construct(); // EJECUTAMOS LA CLASE MODELS DE LIBRARIES
	}

	public function get()
	{
		try {
			$query = $this->modelsData->connect()->prepare("SELECT * FROM user");// PREPARAMOS LA CONSULTA
			$query->execute();// EJECUTAMOS LA CONSULTA
			$stmt = $query->fetchAll(PDO::FETCH_OBJ);// LA ALMACENAMOS
			return $stmt;// LA RETORNAMOS
		} catch (PDOException $e) {
			return null;
		}
	}

	public function userValid($usuario, $password)
	{
		try {
			$query = $this->modelsData->connect()->prepare("SELECT * FROM user WHERE usuario = :usuario");
			$query->execute(["usuario" => $usuario]);

			// $stmt2 = $query->fetchAll(PDO::FETCH_OBJ);
			// $stmt = $query->rowCount(); 
			// if ($stmt > 0) {
			// 	foreach ($stmt2 as $user) {
			// 		$clave = $user->clave;
			// 	}
			// 	if (password_verify($password, $clave)) {
			// 		$response = "true";
			// 	}
			// 	// $query2 = $this->modelsData->connect()->prepare("SELECT * FROM user WHERE usuario = :usuario AND clave = :clave");
			// 	// $query2->execute(["usuario" => $usuario, "clave" => $password]);
			// 	// $stmt2 = $query2->rowCount();
			// 	// if ($stmt2 > 0) {
			// 	// 	$response = "true";
			// 	// }
			// }

			$cnt = $query->rowCount();
			if ($cnt > 0) {
				$verf = $query->fetch(PDO::FETCH_OBJ);
				if (password_verify($password, $verf->clave)) {
					$array = ["success" => "Datos correctos...", "tipo" => "success"];
					session_start();
					$_SESSION['TOKEN'] = md5(uniqid(mt_rand(), true)) . (microtime(true));
					$object =  (object) $array;
					return $object;
				}else {
					$array = ["fail" => "Clave incorrecto.", "tipo" => "warning"];
					$object =  (object) $array;
					return $object;
				}
			} else {
				$array = ["fail" => "Usuario incorrecto.", "tipo" => "warning"];
				$object =  (object) $array;
				return $object;
			}

		} catch (PDOException $e) {
			$array = ["fail" => $e->getMessage(), "tipo" => "danger"];
			// $array = ["fail" => "Error de consulta, consultar con el Administrador.", "tipo" => "danger"];
			$object =  (object) $array;
			return $object;
		} finally {
			$query = null;
		}
	}
}
