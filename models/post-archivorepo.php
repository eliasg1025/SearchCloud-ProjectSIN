<?php

class PostArchivoRepo {

    private $idArchivoRepo;
	private $fechaPublicacion;
	private $titulo;
	private $resumen;
	private $rutaArchivo;
	private $Calificacion_idCalificacion;
	private $NombreUsuario;
    private $NombreUniversidad;
    private $NombreTopico;


	function __construct($idArchivoRepo, $fechaPublicacion, $titulo, $resumen, $rutaArchivo, $Calificacion_idCalificacion, $NombreUsuario, $NombreUniversidad, $NombreTopico) {
        $this->idArchivoRepo = $idArchivoRepo;
		$this->fechaPublicacion = $fechaPublicacion;
		$this->titulo = $titulo;
		$this->resumen = $resumen;
		$this->rutaArchivo = $rutaArchivo;
		$this->Calificacion_idCalificacion = $Calificacion_idCalificacion;
		$this->NombreUsuario = $NombreUsuario;
        $this->NombreUniversidad = $NombreUniversidad;
        $this->NombreTopico = $NombreTopico;
	}

    public function getIdArchivoRepo()
    {
        return $this->idArchivoRepo;
    }

	public function getFechaPublicacion()
	{
		return $this->fechaPublicacion;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}

    public function getResumen()
	{
		return $this->resumen;
	}

	public function getRutaArchivo()
	{
		return $this->rutaArchivo;
	}

	public function getCalificacion_idCalificacion()
	{
		return $this->Calificacion_idCalificacion;
	}

	public function getNombreUsuario()
	{
		return $this->NombreUsuario;
	}

    public function getNombreUniversidad()
    {
        return $this->NombreUniversidad;
    }

    public function getNombreTopico()
    {
        return $this->NombreTopico;
    }
}
?>
