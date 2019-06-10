<?php

session_start();

require "../database.php";
require "../models/admin-usuario.php";

$conexion = abrirConexion();

if (isset($_SESSION['idUsuario'])) {

    $usuario = new Usuario($conexion, $_SESSION["idUsuario"]);

} else {
    header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud | Preguntar</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="../assets/css/custom/question-style.css">
</head>

<body>
    <?php require "../partials/user-navbar.php" ?>

    <!-- LAYOUT -->
    <div class="layout-container">

        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <div class="container title-container">
                <h2 class="text-white">Comienza a preguntar</h2>
            </div>

            <!-- FORM CONTAINER -->
            <div class="ask-container">
                <!-- register-right -->
                <!-- FORM -->
                <form action="index.php" method="" class="ask-form">
                    <!-- register-form -->
                    <div class="form-group">
                        <select class="form-control">
                            <option class="hidden" selected disabled>Elija el tema</option>
                            <option>Matematicas</option>
                            <option>Quimica</option>
                            <option>Biologia</option>
                            <option>Fisica</option>
                            <option>Ingenieria</option>
                            <option>Derecho</option>
                            <option>Informatica</option>
                            <option>Economia</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="ask" id="ask" cols="50" rows="10"
                            placeholder="Escriba su pregunta">
                        </textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-8">
                            <label id="insert-label" for="upload-image upload-file">Insertar documentos:</label>
                        </div>
                        <div id="upload-image" class="upload col-2">
                            <label for="file-input">
                                <i class="fas fa-upload"></i>
                            </label>
                            <input id="file-input" type="file">
                        </div>
                        <div id="upload-file" class="upload col-2">
                            <label for="image-input">
                                <i class="fas fa-images"></i>
                            </label>
                            <input id="image-input" type="file" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enviar" />
                    </div>
                </form>
                <!-- END FORM -->
            </div>
        </div>

        <?php require "../partials/right-section.php" ?>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Popovers -->
    <script type="text/javascript" src="../assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="../assets/js/scripts/profile-popover.js"></script>
</body>

</html>
