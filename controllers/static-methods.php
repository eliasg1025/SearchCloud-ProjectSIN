<?php

class GetById
{
    private $conexion;

    function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getNombreUniversidad($Universidad_idUniversidad)
    {
        $sqlUniv = "SELECT * FROM `modelosin`.`universidad` WHERE `idUniversidad`=:Universidad_idUniversidad";

        $registroUniv = $this->conexion->prepare($sqlUniv);
        $registroUniv->bindParam(":Universidad_idUniversidad", $Universidad_idUniversidad);
        $registroUniv->execute();

        // Retorna una array asociativo con los resultados
        $resultsUniv = $registroUniv->fetch(PDO::FETCH_ASSOC);
        $nombreUniversidad = $resultsUniv["nombre"];

        return $nombreUniversidad;
    }
}


 ?>
