<?php

class Respuetas
{
	private $idRespuestas;
	private $fechaPublicacion;
	private $texto;
	private $archivoAdjunto;
	private $imagenAdjunta;
	private $Calificacion_idCalificacion;
	private $Usuario_idUsuario;
	private $Post_idPost;

	function _construct($idRespuestas, $fechaPublicacion, $texto, $archivoAdjunto, $imagenAdjunta, $Calificacion_idCalificacion, $Usuario_idUsuario, $Post_idPost)
	{
		$this->idRespuestas = $idRespuestas;
		$this->fechaPublicacion = $fechaPublicacion;
		$this->texto = $texto;
		$this->archivoAdjunto = $archivoAdjunto;
		$this->imagenAdjunta = $imagenAdjunta;
		$this->Calificacion_idCalificacion = $Calificacion_idCalificacion;
		$this->Usuario_idUsuario = $Usuario_idUsuario;
		$this->Post_idPost = $Post_idPost;
	}

	public function getidRespuestas()
	{
		return $this->idRespuestas;
	}

	public function getfechaPublicacion()
	{
		return $this->fechaPublicacion;
	}

	public function gettexto()
	{
		return $this->texto;
	}

	public function getarchivoAdjunto()
	{
		return $this->archivoAdjunto;
	}

	public function getimagenAdjunta()
	{
		return $this->texto;
	}

	public function getCalificacion_idCalificacion()
	{
		return $this->Calificacion_idCalificacion;
	}

	public function getUsuario_idUsuario()
	{
		return $this->Usuario_idUsuario;
	}

	public function getPost_idPost()
	{
		return $this->Post_idPost;
	}
}
?>
