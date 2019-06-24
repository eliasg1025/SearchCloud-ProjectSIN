<?php

include_once 'post.php';

class AdminPost
{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getPostById($idPostSesion) {
        $records = $this->conexion->prepare('SELECT * FROM `post` WHERE `idPost`=:idPost');
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

    public function getCantidadRespuestasPorPost() {
        $sql = "SELECT Post_idPost, COUNT(*) FROM respuesta GROUP BY Post_idPost";
        $result = $this->conexion->query($sql);

        $cantidadRespuestas = array();

        while ($row = $result->fetch(PDO::FETCH_BOTH)) {
            $Post_idPost = $row[0];
            $numeroRespuestas = $row[1];

            $cantidadRespuestas[$Post_idPost] = $numeroRespuestas;
        }

        return $cantidadRespuestas;
    }

    public function getPostByDateDESC($palabra_buscar, $Topico_idTopicoSession, $start, $items_by_page) {

        if ($Topico_idTopicoSession != 0) {
            $sql = "SELECT * FROM post
                    WHERE ((post.titulo LIKE '%$palabra_buscar%') OR (post.texto LIKE '%$palabra_buscar%')) AND (post.Topico_idTopico = $Topico_idTopicoSession)
                    ORDER BY post.fechaPublicacion DESC LIMIT $start, $items_by_page";
        } else {
            $sql = "SELECT * FROM post
                    WHERE (post.titulo LIKE '%$palabra_buscar%' OR post.texto LIKE '%$palabra_buscar%')
                    ORDER BY post.fechaPublicacion DESC LIMIT $start, $items_by_page";
        }

        $result = $this->conexion->query($sql);

        $arrayPost = array();
        $count = 0;

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

    public function getPostByDateASC($palabra_buscar, $Topico_idTopicoSession, $start, $items_by_page) {
        if ($Topico_idTopicoSession != 0) {
            $sql = "SELECT * FROM post
                    WHERE ((post.titulo LIKE '%$palabra_buscar%') OR (post.texto LIKE '%$palabra_buscar%')) AND (post.Topico_idTopico = $Topico_idTopicoSession)
                    ORDER BY post.fechaPublicacion ASC LIMIT $start, $items_by_page";
        } else {
            $sql = "SELECT * FROM post
                    WHERE ((post.titulo LIKE '%$palabra_buscar%') OR (post.texto LIKE '%$palabra_buscar%')
                    ORDER BY post.fechaPublicacion ASC LIMIT $start, $items_by_page";
        }

        $result = $this->conexion->query($sql);

        $arrayPost = array();
        $count = 0;

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

    public function getTotalPages($palabra_buscar, $Topico_idTopicoSession, $items_by_page)
    {
        if ($Topico_idTopicoSession != 0) {
            $sql = "SELECT * FROM post
                    WHERE post.titulo LIKE '%$palabra_buscar%' OR post.texto LIKE '%$palabra_buscar%' AND post.Topico_idTopico = $Topico_idTopicoSession";
        } else {
            $sql = "SELECT * FROM post
                    WHERE post.titulo LIKE '%$palabra_buscar%' OR post.texto LIKE '%$palabra_buscar%'";
        }

        $result = $this->conexion->prepare($sql);
        $result->execute(array());
        $num_registros = $result->rowCount();

        $total_pages = ceil($num_registros / $items_by_page);

        return $total_pages;
    }


}


?>
