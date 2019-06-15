<?php

class AdminTopico
{
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function getListaTopico()
    {
        $sqlTopico = "SELECT * FROM `modelosin`.`topico`";
        $registrosTopico = $this->conexion->prepare($sqlTopico);
        $registrosTopico->execute();

        $listaTopicos = array();
        $count = 0;

        while($row = $registrosTopico->fetch(PDO::FETCH_ASSOC)) {
            $idTopico = $row["idTopico"];
            $nombre = $row["nombre"];

            $topico = array("idTopico" => $idTopico, "nombre" => $nombre);

            $listaTopicos[$count] = $topico;
            $count++;
        }
        
        return $listaTopicos;
    }
}


?>