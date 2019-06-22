<?php
    function isActive($Topico_idTopico, $currentIdTopico) {
        if ($Topico_idTopico == $currentIdTopico) {
            return "active";
        }
    }

    function isActivePage($page, $currentPage) {
        if ($page == $currentPage) {
            return "active";
        }
    }

    function isActiveOrder($order, $currentOrder) {
        if ($page == $currentPage) {
            return "true";
        }
    }
?>
