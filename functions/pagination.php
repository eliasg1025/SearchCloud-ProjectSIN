<?php

// Definiendo el numero de elementos por pagina
define('NUM_ITEMS_BY_PAGE', 10);

function getPaginationValues()
{
    if (isset($_GET['pagina'])) {

        if ($_GET['pagina'] == 1) {
            header("Location: https://searchcloud-project.herokuapp.com/main/index.php");
        } else {
            $pagina = $_GET['pagina'];
        }

    } else {
        $pagina = 1;
    }
    $start = ($pagina - 1) * NUM_ITEMS_BY_PAGE; //


    $values = array("start" => $start, "items_by_page" => NUM_ITEMS_BY_PAGE);

    return $values;
}
