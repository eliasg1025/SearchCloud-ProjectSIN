<?php

/**
 * Clase post
 */
class Post
{
    private $idPost;
    private $fechaPublicacion;
    private $titulo;
    private $texto;
    private $archivoAdjunto;
    private $imagenAdjunta;
    private $Topico_idTopico;
    private $Usuario_idUsuario;

    function __construct($idPost, $fechaPublicacion, $titulo, $texto, $archivoAdjunto, $imagenAdjunta, $Topico_idTopico, $Usuario_idUsuario)
    {
        $this->idPost = $idPost;
        $this->fechaPublicacion = $fechaPublicacion;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->archivoAdjunto = $archivoAdjunto;
        $this->imagenAdjunta = $imagenAdjunta;
        $this->Topico_idTopico = $Topico_idTopico;
        $this->Usuario_idUsuario = $Usuario_idUsuario;
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

    public function getIdTopico() {
        return $this->Topico_idTopico;
    }

    public function getIdUsuario() {
        return $this->Usuario_idUsuario;
    }
}


?>
