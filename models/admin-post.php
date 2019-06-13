<?php

include_once 'post.php';

class AdminPost
{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getPostById($idPostSesion) {
        $records = $this->conexion->prepare('SELECT * FROM `modelosin`.`post` WHERE `idPost`=:idPost');
        $records->bindParam(':idPost', $idPostSesion);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
          $datosPost = $results;
        }

        $idPost = $datosPost["idPost"];
        $fechaPublicacion = $datosPost["fechaPublicacion"];
        $titulo = $datosPost["titulo"];
        $texto = $datosPost["texto"];
        $archivoAdjunto = $datosPost["archivoAdjunto"];
        $imagenAdjunta = $datosPost["imagenAdjunta"];
        $Topico_idTopico = $datosPost["Topico_idTopico"];
        $Usuario_idUsuario = $datosPost["Usuario_idUsuario"];

        $post = new Post($idPost, $fechaPublicacion, $titulo, $texto, $archivoAdjunto, $imagenAdjunta, $Topico_idTopico, $Usuario_idUsuario);

        return $post;
    }

    public function getPostByDateDESC($start, $total_pages) {
        $arrayPost = array();
        $count = 0;

        $sql = "SELECT * FROM `modelosin`.`post` ORDER BY `fechaPublicacion` DESC LIMIT $start, $total_pages";
        $result = $this->conexion->query($sql);

        while ($register = $result->fetch(PDO::FETCH_ASSOC)) {

            $idPost = $register["idPost"];
            $fechaPublicacion = $register["fechaPublicacion"];
            $titulo = $register["titulo"];
            $texto = $register["texto"];
            $archivoAdjunto = $register["archivoAdjunto"];
            $imagenAdjunta = $register["imagenAdjunta"];
            $Topico_idTopico = $register["Topico_idTopico"];
            $Usuario_idUsuario = $register["Usuario_idUsuario"];

            $post = new Post($idPost, $fechaPublicacion, $titulo, $texto, $archivoAdjunto, $imagenAdjunta, $Topico_idTopico, $Usuario_idUsuario);

            $arrayPost[$count] = $post;

            $count++;
        }

        return $arrayPost;
    }
}


?>
