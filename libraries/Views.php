<?php
class Views // ESTA CLASE ESTA SIENDO LLAMADA EN EL ARCHIVO INDEX.PHP
{
	function __construct() // NO USAMOS EL CONSTRUCTOR
	{
		// echo "Views Active <br>";
	}
	function renderHeadFooter($controller, $view) // ESTE METODO SOLO REQUIERE DE DOS PARAMETROS, EL NOMBRE DE LA CLASE Y LA VISTA QUE DESEA
	{
		$controller = get_class($controller); // OBTENEMOS EL NOMBRE DE LA CLASE
		$controller = strtolower($controller);
		// VIEWS Y DFT SON VARIABLES DEL ARCHIVO CONFIG.PHP DE LA CARPETA CONFIG
		require VIEWS . DFT . "css.php"; // ESTE CONTIENE EL ENCABEZADO DEL HTML Y LLAMA A LOS .CSS
		require VIEWS . DFT . "head.php"; // ESTE ES UN ENCABEZADO 
		require VIEWS . $controller . "/" . $view . ".php"; // EL CONTENIDO QUE PUEDE VARIA DEPENDIENDO DEL CONTROLADOR
		require VIEWS . DFT . "footer.php"; // ESTE ES UN FOOTER
		require VIEWS . DFT . "js.php"; // ACA CERRAMOS EL HTML Y TAMBIEN LLAMA A LOS .JS
	}
	function renderHeadAdmin($controller, $view) // ES IGUAL QUE EL DE ARRIBA PERO CON OTRAS PLANTILLAS
	{
		$controller = get_class($controller);
		$controller = strtolower($controller);
		require VIEWS . DFT . "css.php";
		require VIEWS . DFT . "admhead.php";
		require VIEWS . $controller . "/" . $view . ".php";
		require VIEWS . DFT . "admfooter.php";
		require VIEWS . DFT . "js.php";
	}
	function render($controller, $view) // ES IGUAL QUE EL DE ARRIBA PERO CON OTRAS PLANTILLAS
	{
		$controller = get_class($controller);
		$controller = strtolower($controller);
		require VIEWS . DFT . "css.php";
		require VIEWS . $controller . "/" . $view . ".php";
		require VIEWS . DFT . "js.php";
	}
}
// PUEDES QUITAR LOS REQUIRE DEL HEAD, FOOTER, CSS Y JS Y INCLUIRLO EN EL DOCUMENTO PRINCIPAL, DEPENDERA DE COMO QUIERAS
// UHMM.. AHORA NO SE QUE PARTE RECOMENDAR A SEGUIR..; REGRESAR AL CONTROLADOR LOGIN PARA LUEGO IR AL MODELO LOGIN, EL CONTROLADOR ERROR NO TIENE UN MODELO SOLO ES UNA VISTA