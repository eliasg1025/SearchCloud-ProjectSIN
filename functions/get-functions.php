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
    
}


 ?>
