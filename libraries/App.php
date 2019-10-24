<?php
// REQUERIMOS 
require "controllers/Error.php";

class App
{
	function __construct()
	{
		// TODO EN EL CONSTRUCTOR PARA QUE SE EJECUTE CUANDO LO INSTACIAMOS;
		$url = $_GET["url"] ?? "Login"; // OBTENEMOS EL URL SI NO HAY LE ASIGNAMOS "login"
		$url = rtrim($url, '/'); // QUITAMOS LAS BARRAS DE DUPLICADAS "url//"
		$url = explode("/", $url); // SEPARAMOS POR LA BARRA PARA OBTENER UN ARRAY
		$controller = ""; // VARIABLE VACIA

		if (isset($url[0])) { // SI HAY CONTENIDO EL LA POSICION [0] DEL ARRAY
			$controller = $url[0]; 
			$controller = ucfirst($controller); 
		}
		
		$nparam = sizeof($url); // TAMAÑO DEL ARRAY<
		$error = new Errors();	// INSTANCIAMOS LA CLASE ERRORS 
		$controllersPath = "controllers/$controller.php"; // CREAMOS UNA RUTA PARA ENCONTRAR EL CONTROLADOR

		if (file_exists($controllersPath)) { // SI EXISTE :V

			require $controllersPath; // LO REQUERIMOS
			$controller = new $controller(); // LO INSTANCIAMOS

			if ($nparam > 1) { // Y SI HAY MAS DE LA POSICION [0] DEL ARRAY "http://dominio.com/url[0]/url[1]/url[2]...", $nparam = sizeof($url) 

				if (isset($url[1])) { // SI HAY VERIFICAMOS SI NO ES NULL
					$method = $url[1]; // ESTE SERA NUESTRO METODO
					if (method_exists($controller, $method)) { // VERIFICAMOS SI EXISTE EL METODO
						if ($nparam > 2) { // VERIFICAMOS SI HAY MAS 

							$param = []; 

							for ($i = 2; $i < $nparam; $i++) { // DESPUES DEL LA POSICION URL[1] SERAN PARAMETROS
								array_push($param, $url[$i]);
								// RESUMEN "http://dominio.com/CLASE(SE EJECUTA EL CONSTRUCTOR)/METODO(FUNCTION)/[PARAMETRO1/ PARAMETRO2 / ...]"
							}

							$controller->{$method}($param); // LE DAMOS AL METODO LOS PARAMETROS
						} else {
							$controller->{$method}(); // SOLO DAMOS EL METODO
						}

					} else {
						$error->error(); // SI NO EXISTE EL METODO SE MOSTRARA ERROR VISTA
					}
				}

			}else{
				$controller->render(); // SOLO HAY URL[0] MOSTRAMOS CONTENIDO VISTA
			}

		} else {
			$error->error(); // SI NO EXISTE LA CLASE SE MOSTRARA ERROR VISTA
		}
	}
}
// HASTA ESTE PUNTO ESTAMOS LLAMANDO A LOS CONTROLADORES DE LA CARPETA CONTROLLERS, CADA CONTROLADOR ES HIJO DEL CONTROLADOR DE ESTA CARPETA LIBRARIES. REVISAR ERROR