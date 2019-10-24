<?php
class InicioModel extends Models
{
	public function __construct()
	{
		parent::__construct();
	}

	public function userList()
	{
		try {
			$query = $this->modelsData->connect()->prepare("SELECT * FROM user");
			$query->execute();
			$cnt = $query->rowCount();
			if ($cnt > 0) {
				return $query->fetchAll(PDO::FETCH_OBJ);
			} else {
				$array = ["fail" => "No hay datos para Mostrar.", "tipo" => "warning"];
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

	public function userSelect($id)
	{
		try {
			$query = $this->modelsData->connect()->prepare("SELECT id, usuario, clave FROM user WHERE id = :id");
			$query->execute(["id" => $id]);
			$cnt = $query->rowCount();
			if ($cnt > 0) {
				return $query->fetchAll(PDO::FETCH_OBJ);
			} else {
				$array = ["fail" => "No hay datos para Mostrar.", "tipo" => "warning"];
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

	public function userDelet($id)
	{
		try {
			$query = $this->modelsData->connect()->prepare("DELETE FROM user WHERE id = :id");
			$query->execute(["id" => $id]);
			$cnt = $query->rowCount();
			if ($cnt > 0) {
				$array = ["success" => "Se elimino correctamente.", "tipo" => "success"];
				$object =  (object) $array;
				return $object;
			} else {
				$array = ["fail" => "No se pudo eliminar.", "tipo" => "warning"];
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

	public function userRegist($usuario, $clave)
	{
		try {
			$query = $this->modelsData->connect()->prepare("INSERT INTO user (usuario, clave) VALUES (:usuario, :clave)");
			$query->execute(["usuario" => $usuario, "clave" => $clave]);
			$cnt = $query->rowCount();
			if ($cnt > 0) {
				$array = ["success" => "Se Registro correctamente.", "tipo" => "success"];
				$object =  (object) $array;
				return $object;
			} else {
				$array = ["fail" => "No se pudo registrar.", "tipo" => "warning"];
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

	public function userUpdat($id, $usuario, $clave)
	{
		try {
			$query = $this->modelsData->connect()->prepare("UPDATE user SET  clave = :clave WHERE id = :id");
			$query->execute(["id" => $id, "clave" => $clave]);
			$cnt = $query->rowCount();
			if ($cnt > 0) {
				$array = ["success" => "Se actualizo correctamente.", "tipo" => "success"];
				$object =  (object) $array;
				return $object;
			} else {
				$array = ["fail" => "No se pudo actualizar.", "tipo" => "warning"];
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
