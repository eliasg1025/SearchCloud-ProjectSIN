<?php

class Usuario
{

    private $idUsuario;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $password;
    private $fechaNacimiento;
    private $imagenPerfil;
    private $Universidad_idUniversidad;
    private $Tarjeta_idTarjeta;
    private $Genero_idGenero;

    function __construct($idUsuario, $nombre, $apellido, $email, $telefono, $password, $fechaNacimiento, $imagenPerfil, $Universidad_idUniversidad, $Tarjeta_idTarjeta, $Genero_idGenero)
    {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->password = $password;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->imagenPerfil = $imagenPerfil;
        $this->Universidad_idUniversidad = $Universidad_idUniversidad;
        $this->Tarjeta_idTarjeta = $Tarjeta_idTarjeta;
        $this->Genero_idGenero = $Genero_idGenero;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getImagenPerfil()
    {
        return $this->imagenPerfil;
    }

    public function getUniversidad_idUniversidad()
    {
        return $this->Universidad_idUniversidad;
    }

    public function getTarjeta_idTarjeta()
    {
        return $this->Tarjeta_idTarjeta;
    }

    public function getGenero_idGenero()
    {
        return $this->Genero_idGenero;
    }
}


 ?>
