<?php

include_once "respuesta.php";

class AdminRespuesta
{
    private $conexion;

    function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getRespuestasByIdPost($Post_idPostSesion)
    {
        $arrayRepuestas = array();
        $count = 0;

        $sql = "SELECT * FROM `modelosin`.`respuesta` WHERE `Post_idPost` = :Post_idPost";
        $records = $this->conexion->prepare($sql);
        $records->bindParam(':Post_idPost', $Post_idPostSesion);
        $records->execute();

        while ($register = $records->fetch(PDO::FETCH_ASSOC)) {

            $idRespuesta = $register["idRespuesta"];
            $fechaPublicacion = $register["fechaPublicacion"];
            $texto = $register["texto"];
            $archivoAdjunto = $register["archivoAdjunto"];
            $imagenAdjunta = $register["imagenAdjunta"];
            $Calificacion_idCalificacion = $register["Calificacion_idCalificacion"];
            $Usuario_idUsuario = $register["Usuario_idUsuario"];
            $Post_idPost = $register["Post_idPost"];

            $respuesta = new Respuesta($idRespuesta, $fechaPublicacion, $texto, $archivoAdjunto, $imagenAdjunta, $Calificacion_idCalificacion, $Usuario_idUsuario, $Post_idPost);

            $arrayRepuestas[$count] = $respuesta;

            $count++;
        }

        return $arrayRepuestas;
    }
}


 ?>
