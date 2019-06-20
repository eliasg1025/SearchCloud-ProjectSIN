<?php

include_once "usuario.php";

class AdminUsuario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getUsuarioById($idUsuarioSesion)
    {
        $records = $this->conexion->prepare('SELECT * FROM `usuario` WHERE `idUsuario`=:idUsuario');
        $records->bindParam(':idUsuario', $idUsuarioSesion);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
          $datosUsuario = $results;
        }

        $idUsuario = $datosUsuario["idUsuario"];
        $nombre = $datosUsuario["nombre"];
        $apellido = $datosUsuario["apellido"];
        $email = $datosUsuario["email"];
        $telefono = $datosUsuario["telefono"];
        $password = $datosUsuario["password"];
        $fechaNacimiento = $datosUsuario["fechaNacimiento"];
        $imagenPerfil = $datosUsuario["imagenPerfil"];
        $Universidad_idUniversidad = $datosUsuario["Universidad_idUniversidad"];
        $Tarjeta_idTarjeta = $datosUsuario["Tarjeta_idTarjeta"];
        $Genero_idGenero = $datosUsuario["Genero_idGenero"];

        $usuario = new Usuario($idUsuario, $nombre, $apellido, $email, $telefono, $password, $fechaNacimiento, $imagenPerfil, $Universidad_idUniversidad, $Tarjeta_idTarjeta, $Genero_idGenero);

        return $usuario;
    }
}

?>
