<?php
class Controllers // ESTA CLASE ESTA SIENDO LLAMADA EN EL ARCHIVO INDEX.PHP
{
	function __construct()
	{
		// echo "Controllers Active <br>";
		// CREAMOS UNA VARIABLE Y LE DAMOS EL VALOR DE LA CLASE VIEWS, LA QUE SE ENCUENTRA EN ESTA CARPETA LIBRARIES
		$this->view = new Views(); // LA CLASE VIEWS TAMBIEN ESTA SIENDO LLAMADA EN EL ARCHIVO INDEX.PHP
		$this->loadModel(); // EJECUTAMOS EL METODO "loadModel()" QUE ESTA ABAJO
	}

	function loadModel()
	{
		$path = 'models/' . get_class($this)  . '.php'; // VARIABLE CON LA RUTA PARA LLAMAR A UN MODELO DE LA CARPETA MODELS
		// get_class($this) OBTENEMOS EL NOMBRE DE LA CLASE DEL CONTROLADOR (LOS HIJOS) EJEMPLO: "Errors"

		if (file_exists($path)) { // VERIFICAMOS SI EXISTE
			require $path; // SI EXISTE LO REQUERIMOS
			$modelName = get_class($this) . 'Model'; // CANCATENAMOS PARA CREAR EL NOMBRE DE LA CLASE DEL ARCHIVO MODELS
			$this->model = new $modelName(); // LO INSTANCIAMOS EN LA VARIABLE MODEL 
		}
	}
}
// RECOMIENDO REVISAR PRIMERO LA VISTA, VIEWS ESTA EN ESTA CARPETA LIBRARIES