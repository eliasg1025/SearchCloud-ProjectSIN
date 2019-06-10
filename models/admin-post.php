<?php

include_once 'post.php';

class AdminPost
{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getPostByDateDESC() {
        $arrayPost = array();
        $count = 0;

        $sql = "SELECT * FROM `modelosin`.`post` ORDER BY `fechaPublicacion` DESC";
        $result = $this->conexion->query($sql);

        while ($register = $result->fetch(PDO::FETCH_ASSOC)) {

            $idPost = $register["idPost"];
            $fechaPublicacion = $register["fechaPublicacion"];
            $titulo = $register["titulo"];
            $texo = $register["texto"];
            $archivoAdjunto = $register["archivoAdjunto"];
            $imagenAdjunta = $register["imagenAdjunta"];
            $Topico_idTopico = $register["Topico_idTopico"];
            $Usuario_idUsuario = $register["Usuario_idUsuario"];

            $post = new Post($idPost, $fechaPublicacion, $titulo, $texo, $archivoAdjunto, $imagenAdjunta, $Topico_idTopico, $Usuario_idUsuario);

            $arrayPost[$count] = $post;

            $count++;
        }

        return $arrayPost;
    }
}


?>
