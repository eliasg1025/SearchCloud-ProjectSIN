<?php

class GetById
{
    private $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getNombreUniversidad($Universidad_idUniversidad)
    {
        $sqlUniv = "SELECT `nombre` FROM `universidad` WHERE `idUniversidad`=:Universidad_idUniversidad";

        $registroUniv = $this->conexion->prepare($sqlUniv);
        $registroUniv->bindParam(":Universidad_idUniversidad", $Universidad_idUniversidad);
        $registroUniv->execute();

        // Retorna una array asociativo con los resultados
        $resultsUniv = $registroUniv->fetch(PDO::FETCH_ASSOC);
        $nombreUniversidad = $resultsUniv["nombre"];

        return $nombreUniversidad;
    }

    public function getNombreUsuario($Usuario_idUsuario)
    {
        $sql = "SELECT `nombre` FROM `usuario` WHERE `idUsuario`=:Usuario_idUsuario";

        $registro = $this->conexion->prepare($sql);
        $registro->bindParam(":Usuario_idUsuario", $Usuario_idUsuario);
        $registro->execute();

        // Retorna una array asociativo con los resultados
        $resultado= $registro->fetch(PDO::FETCH_ASSOC);
        $nombreUsuario = $resultado["nombre"];

        return $nombreUsuario;
    }

    public function getNombreTopico($Topico_idTopico)
    {
        $sql = "SELECT `nombre` FROM `topico` WHERE `idTopico`=:Topico_idTopico";

        $registro= $this->conexion->prepare($sql);
        $registro->bindParam(":Topico_idTopico", $Topico_idTopico);
        $registro->execute();

        // Retorna una array asociativo con los resultados
        $resultado = $registro->fetch(PDO::FETCH_ASSOC);
        $nombreTopico = $resultado["nombre"];

        return $nombreTopico;
    }

    public function getCountPosts($Usuario_idUsuario) {
        $sql = "SELECT COUNT(*) FROM post WHERE post.Usuario_idUsuario = $Usuario_idUsuario";

        $registro = $this->conexion->query($sql);

        $resultado = $registro->fetch(PDO::FETCH_ASSOC);
        $cantidad_posts = $resultado["COUNT(*)"];

        return $cantidad_posts;
    }

    public function getCountRespuestas($Usuario_idUsuario) {
        $sql = "SELECT COUNT(*) FROM respuesta WHERE respuesta.Usuario_idUsuario = $Usuario_idUsuario";

        $registro = $this->conexion->query($sql);

        $resultado = $registro->fetch(PDO::FETCH_ASSOC);
        $cantidad_respuestas = $resultado["COUNT(*)"];

        return $cantidad_respuestas;
    }

    public function getCountArchivos($Usuario_idUsuario) {
        $sql = "SELECT COUNT(*) FROM archivorepo WHERE archivorepo.Usuario_idUsuario = $Usuario_idUsuario";

        $registro = $this->conexion->query($sql);

        $resultado = $registro->fetch(PDO::FETCH_ASSOC);
        $cantidad_archivos = $resultado["COUNT(*)"];

        return $cantidad_archivos;
    }
}


 ?>
