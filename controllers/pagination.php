<?php

// Definiendo el numero de elementos por pagina
define('NUM_ITEMS_BY_PAGE', 10);

function getPaginationValues($conexion)
{
    if (isset($_GET['pagina'])) {

        if ($_GET['pagina'] == 1) {
            header("Location: /Projects/SearchCloud-ProjectSIN/main/index.php");
        } else {
            $pagina = $_GET['pagina'];
        }

    } else {
        $pagina = 1;
    }
    $start = ($pagina - 1) * NUM_ITEMS_BY_PAGE; //


    $resultado = $conexion->prepare("SELECT * FROM `modelosin`.`post`");
    $resultado->execute(array());
    $num_rows = $resultado->rowCount();
    $total_pages = ceil($num_rows / NUM_ITEMS_BY_PAGE); //


    $values = array("start" => $start, "total_pages" => $total_pages, "items_by_page" => NUM_ITEMS_BY_PAGE);

    return $values;
}
