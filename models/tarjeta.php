<?php

class Tarjeta {

	private $idTarjeta;
	private $numTarjeta;
	private $fechaVencimiento;
	private $cvv;
	private $nombreTitular;

	function __construct($idTarjeta, $numTarjeta, $fechaVencimiento, $cvv, $nombreTitular)
	{
		$this->idTarjeta = $idTarjeta;
		$this->numTarjeta = $numTarjeta;
		$this->fechaVencimiento = $fechaVencimiento;
		$this->cvv = $cvv;
		$this->nombreTitular = $nombreTitular;

	}

	public function getidTarjeta()
	{
		return $this->idTarjeta;
	}

	public function getnumTarjeta()
	{
		return $this->numTarjeta;
	}

	public function getfechaVencimiento()
	{
		return $this->fechaVencimiento;
	}

	public function getcvv()
	{
		return $this->cvv;
	}

	public function getnombreTitular()
	{
		return $this->nombreTitular;
	}
}
?>
