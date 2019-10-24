<?php
class Conexion
{
	private $host;
	private $db;
	private $user;
	private $password;
	private $charset;

	function __construct() // DAMOS VALORES A LAS VARIABLES CUANDO LA CLASE ES INSTANCIADO
	{ // LAS CONSTANT SE ENCUENTRAN EN CONFIG.PHP
		$this->host     = constant('HOST');
		$this->db       = constant('DB');
		$this->user     = constant('USER');
		$this->password = constant('PASSWORD');
		$this->charset  = constant('CHARSET');
	}

	function connect()
	{
		try {

			$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$pdo = new PDO($connection, $this->user, $this->password, $options);
			// REALIZAMOS LA CONEXION REGRESAR AL MODELO LOGIN
			return $pdo;
		} catch (PDOException $e) {
			print_r('Error connection: ' . $e->getMessage());
		}
	}
}
