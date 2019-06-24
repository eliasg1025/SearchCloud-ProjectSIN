<?php

/**
 * Clase post
 */
class __Post
{
    private $idPost;
    private $fechaPublicacion;
    private $titulo;
    private $texto;
    private $archivoAdjunto;
    private $imagenAdjunta;
    private $NombreTopico;
    private $NombreUsuario;

    function __construct($idPost, $fechaPublicacion, $titulo, $texto, $archivoAdjunto, $imagenAdjunta, $NombreTopico, $NombreUsuario)
    {
        $this->idPost = $idPost;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->archivoAdjunto = $archivoAdjunto;
        $this->imagenAdjunta = $imagenAdjunta;
        $this->NombreTopico = $NombreTopico;
        $this->NombreUsuario = $NombreUsuario;
    }

    public function getIdPost() {
        return $this->idPost;
    }

    public function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getArchivoAdjunto() {
        return $this->archivoAdjunto;
    }

    public function getImagenAdjunto() {
        return $this->imagenAdjunta;
    }

    public function getNombreTopico() {
        return $this->NombreTopico;
    }

    public function getNombreUsuario() {
        return $this->NombreUsuario;
    }
}

?>
