<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: /Projects/SearchCloud-ProjectSIN/index.php');
?>
