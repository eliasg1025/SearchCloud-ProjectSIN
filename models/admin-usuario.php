<?php

/**
 *
 */
class Usuario
{
    private $datosUsuario;
    private $conexion;

    public function __construct($conexion, $idUsuario)
    {
        $this->conexion = $conexion;

        $records = $this->conexion->prepare('SELECT * FROM `modelosin`.`usuario` WHERE `idUsuario`=:idUsuario');
        $records->bindParam(':idUsuario', $idUsuario);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
          $this->datosUsuario = $results;
        }
    }

    public function getNombre()
    {
        return $this->datosUsuario["nombre"];
    }

    public function getApellido()
    {
        return $this->datosUsuario["apellido"];
    }

    public function getEmail()
    {
        return $this->datosUsuario["email"];
    }

    public function getTelefono()
    {
        return $this->datosUsuario["telefono"];
    }

    public function getFechaNacimiento()
    {
        return $this->datosUsuario["fechaNacimiento"];
    }

    public function getImagenPerfil()
    {
        return $this->datosUsuario["nombre"];
    }

    public function getNombreUniversidad()
    {
        $sqlUniv = "SELECT * FROM `modelosin`.`universidad` WHERE `idUniversidad`=:Universidad_idUniversidad";

        $registroUniv = $this->conexion->prepare($sqlUniv);
        $registroUniv->bindParam(":Universidad_idUniversidad", $this->datosUsuario["Universidad_idUniversidad"]);
        $registroUniv->execute();

        // Retorna una array asociativo con los resultados
        $resultsUniv = $registroUniv->fetch(PDO::FETCH_ASSOC);
        $nombreUniversidad = $resultsUniv["nombre"];

        return $nombreUniversidad;
    }

    public function getIdTarjeta() {
        return $this->datosUsuario["Tarjeta_idTarjeta"];
    }

    public function esPremium()
    {
        if (!empty($this->datosUsuario["Tarjeta_idTarjeta"])) {
            return true;
        } else {
            return false;
        }
    }
}

?>
