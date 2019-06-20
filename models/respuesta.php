<?php

class Respuesta
{
	private $idRespuesta;
	private $fechaPublicacion;
	private $texto;
	private $archivoAdjunto;
	private $imagenAdjunta;
	private $Calificacion_idCalificacion;
	private $Usuario_idUsuario;
	private $Post_idPost;

	function __construct($idRespuesta, $fechaPublicacion, $texto, $archivoAdjunto, $imagenAdjunta, $Calificacion_idCalificacion, $Usuario_idUsuario, $Post_idPost)
	{
		$this->idRespuesta = $idRespuesta;
		$this->fechaPublicacion = $fechaPublicacion;
		$this->texto = $texto;
		$this->archivoAdjunto = $archivoAdjunto;
		$this->imagenAdjunta = $imagenAdjunta;
		$this->Calificacion_idCalificacion = $Calificacion_idCalificacion;
		$this->Usuario_idUsuario = $Usuario_idUsuario;
		$this->Post_idPost = $Post_idPost;
	}

	public function getIdRespuestas()
	{
		return $this->idRespuesta;
	}

	public function getFechaPublicacion()
	{
		return $this->fechaPublicacion;
	}

	public function getTexto()
	{
		return $this->texto;
	}

	public function getArchivoAdjunto()
	{
		return $this->archivoAdjunto;
	}

	public function getImagenAdjunta()
	{
		return $this->imagenAdjunta;
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
