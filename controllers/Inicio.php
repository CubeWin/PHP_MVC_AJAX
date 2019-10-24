<?php
class Inicio extends Controllers
{
	public function __construct()
	{
		session_start();
		if (isset($_SESSION["TOKEN"])) {
			parent::__construct();
		} else {
			$url = constant("URL");
			header("Location: " . $url);
		}
	}

	public function render()
	{
		// $this->users = $this->listarUsuarios();
		$this->view->renderHeadAdmin($this, "inicio");
	}

	public function listarUsuarios()
	{
		if (isset($_SESSION["TOKEN"]) && $_POST["METHOD"] == "usersList") {
			$response 	= $this->model->userList();
			echo json_encode($response);
		}
	}

	public function eliminarUsuario()
	{
		if (isset($_SESSION["TOKEN"]) && $_POST["METHOD"] == "userDelet" && isset($_POST["ID"])) {
			$id = $_POST["ID"];
			$response = $this->model->userDelet($id);
			// $response = ($rsp=="true") ? $rsp : "false" ;
			// echo $response;
			echo json_encode($response);
		}
	}

	public function registrarUsuario()
	{
		if (isset($_SESSION["TOKEN"]) && $_POST["METHOD"] == "userRegister") {
			$usuario 	= $_POST["USUARIO"];
			$clave 		= $_POST["CLAVE"];

			$opciones = [
				'cost' => 12,
			];
			$clave = password_hash($clave, PASSWORD_BCRYPT, $opciones);

			$response 	= $this->model->userRegist($usuario, $clave);
			echo json_encode($response);
		}
	}

	public function actualizarUsuario()
	{
		if (isset($_SESSION["TOKEN"]) && $_POST["METHOD"] == "userUpdate" && isset($_POST["ID"])) {
			$id 		= $_POST["ID"];
			$usuario 	= $_POST["USUARIO"];
			$clave 		= $_POST["CLAVE"];

			$opciones = [
				'cost' => 12,
			];
			$clave = password_hash($clave, PASSWORD_BCRYPT, $opciones);

			$response 	= $this->model->userUpdat($id, $usuario, $clave);
			echo json_encode($response);
		}
	}

	public function seleccionarUsuario()
	{
		if (isset($_SESSION["TOKEN"]) && $_POST["METHOD"] == "userSelect" && isset($_POST["ID"])) {
			$id 		= $_POST["ID"];
			$response 	= $this->model->userSelect($id);
			echo json_encode($response);
		}
	}
}
