<?php

class ArchivoRepo {

	private $idArchivoRepo;
	private $fechaPublicacion;
	private $titulo;
	private $resumen;
	private $rutaArchivo;
	private $Usuario_idUsuario;
	private $Calificacion_idCalificacion;
	private $Topico_idTopico;



	function __construct($idArchivoRepo, $fechaPublicacion, $titulo, $resumen, $rutaArchivo, $Usuario_idUsuario, $Calificacion_idCalificacion, $Topico_idTopico) {
		$this->idArchivoRepo = $idArchivoRepo;
		$this->fechaPublicacion = $fechaPublicacion;
		$this->titulo = $titulo;
		$this->resumen = $resumen;
		$this->rutaArchivo = $rutaArchivo;
		$this->Usuario_idUsuario = $Usuario_idUsuario;
		$this->Calificacion_idCalificacion = $Calificacion_idCalificacion;
		$this->Topico_idTopico = $Topico_idTopico;
	}

	public function getidArchivoRepo()
	{
		return $this->idArchivoRepo;
	}

	public function getfechaPublicacion()
	{
		return $this->fechaPublicacion;
	}

	public function gettitulo()
	{
		return $this->titulo;
	}

    public function getresumen()
	{
		return $this->resumen;
	}
	public function getrutaArchivo()
	{
		return $this->rutaArchivo;
	}
	public function getUsuario_idUsuario()
	{
		return $this->Usuario_idUsuario;
	}
	public function getCalificacion_idCalificacion()
	{
		return $this->Calificacion_idCalificacion;
	}
	public function getTopico_idTopico()
	{
		return $this->Topico_idTopico;
	}
}
?>
