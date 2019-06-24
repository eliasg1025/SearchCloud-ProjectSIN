<?php
    include_once 'new-archivorepo.php';

    class AdminArchivoRepo
    {
        private $conexion;

        function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function getAllArchivosRepo($start, $items_by_page) {
            $sql = "SELECT archivorepo.idArchivoRepo, archivorepo.fechaPublicacion,archivorepo.titulo, archivorepo.resumen, archivorepo.rutaArchivo,
                    archivorepo.Calificacion_idCalificacion, usuario.nombre AS NombreUsuario, universidad.nombre AS NombreUniversidad,
                    topico.nombre AS NombreTopico
                    FROM archivorepo
                    INNER JOIN usuario ON archivorepo.Usuario_idUsuario = usuario.idUsuario
                    INNER JOIN universidad ON usuario.Universidad_idUniversidad = universidad.idUniversidad
                    INNER JOIN topico ON archivorepo.Topico_idTopico = topico.idTopico

                    ORDER BY archivorepo.fechaPublicacion DESC LIMIT $start, $items_by_page";

            $result = $this->conexion->query($sql);
            $arrayArchivos = array();
            $count = 0;

            while ($register = $result->fetch(PDO::FETCH_ASSOC)) {
                $idArchivoRepo = $register["idArchivoRepo"];
                $fechaPublicacion = $register["fechaPublicacion"];
            	$titulo = $register["titulo"];
            	$resumen = $register["resumen"];
            	$rutaArchivo = $register["rutaArchivo"];
            	$Calificacion_idCalificacion = $register["Calificacion_idCalificacion"];
            	$NombreUsuario = $register["NombreUsuario"];
                $NombreUniversidad = $register["NombreUniversidad"];
                $NombreTopico = $register["NombreTopico"];

                $archivorepo = new __ArchivoRepo($idArchivoRepo, $fechaPublicacion, $titulo, $resumen, $rutaArchivo, $Calificacion_idCalificacion, $NombreUsuario, $NombreUniversidad, $NombreTopico);

                $arrayArchivos[$count] = $archivorepo;
                $count++;
            }

            return $arrayArchivos;
        }

        public function getTotalPages($items_by_page)
        {
            $sql = "SELECT * FROM `archivorepo`";

            $result = $this->conexion->prepare($sql);
            $result->execute(array());
            $num_registros = $result->rowCount();

            $total_pages = ceil($num_registros / $items_by_page);

            return $total_pages;
        }
    }

 ?>
