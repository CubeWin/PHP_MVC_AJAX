<?php
class Login extends Controllers // LO MISMO QUE LA CLASE ERRORS
{

	public function __construct()
	{
		parent::__construct(); // EJECUTAMOS EL CONSTRUCTOR DEL PADRE (CARGAMOS LA VISTA Y EL MODELO)
		session_start(); // ESTO LO USO PARA LA FUNCIONALIDAD DEL LOGIN; INICIAMOS LAS VARIABLES DE SESSION
		session_destroy(); // SI EXISTE VARIABLE DE SESSION LO DESTRUIMOS; MAS ADELANTE SE VERA POR QUE SE USA ESTO
	}

	public function render()
	{
		// ESTA ES UNA VISTA POR DEFAULT
		$this->view->render($this, "login"); // MOSTRAMOS LA VISTA, REVISAR APP.PHP QUE ESTA EN LA CARPETA LIBRARIES EN LA CUAL LLAMAMOS A RENDER CUANDO SE CUMPLE CON CIERTAS CONDICIONES
	}
	
	public function listar() // ESTA SE EJECUTARA CUANDO USAMOS LA URL: HTTP://DOMINIO.COM/LOGIN/LISTAR
	{
		// header('Access-Control-Allow-Origin: *');

		if (isset($_POST['user']) && isset($_POST['password'])) { // ESTE METODO NO ESTA ECHO PARA TENER UN VISTA SI NO PARA QUE EJECUTE UNA SENTENCIA CON AJAX; COMPROBAMOS SI SE ENVIO POST CON LAS VARIABLES QUE REQUERIMOS
			$usuario = $_POST['user']; // RECIVE LOS POST
			$password = $_POST['password'];
			// EL MODELO YA ESTA CARGADO Y LO USAREMOS (TIENE EL MISMO NOMBRE DE ESTA CLASE Y SE ENCUENTRA EN LA CARPETA MODELS)
			$response = $this->model->userValid($usuario, $password); // $this->model LLAMA AL METODO DEL MODELO LOGIN IR -> A LA CARPETA MODELS/LOGIN.PHP
			echo json_encode($response);
		}
		
	}
}
