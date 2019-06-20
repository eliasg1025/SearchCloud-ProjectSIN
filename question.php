<?php
    session_start();

    require "database.php";
    require "models/admin-usuario.php";
    require "models/admin-topico.php";
    require "functions/get-functions.php";

    $conexion = abrirConexion();
?>

<?php
    if (isset($_SESSION['idUsuario'])) {

        $adminUsuario = new AdminUsuario($conexion);
        $usuario = $adminUsuario->getUsuarioById($_SESSION["idUsuario"]);

    } else {
        header("Location: login.php");
    }
?>

<?php 
    $getById = new GetById($conexion);
?>

<?php
    $adminTopico = new AdminTopico($conexion);
    $listaTopico = $adminTopico->getListaTopico();
?>

<?php
    if (isset($_POST["titulo"]) && isset($_POST["texto"]) && isset($_POST["Topico_idTopico"]))
    {
        $sql = "INSERT INTO `post` (`fechaPublicacion`, `titulo`, `texto`, `archivoAdjunto`, `imagenAdjunta`, `Topico_idTopico`, `Usuario_idUsuario`) VALUES (:fechaPublicacion, :titulo, :texto, :archivoAdjunto, :imagenAdjunta, :Topico_idTopico, :Usuario_idUsuario)";
        $stmt = $conexion->prepare($sql);

        //Vinculando parametros
        date_default_timezone_set('America/Lima');
        $current_date = date("Y-m-d H:i:s");

        $stmt->bindParam(":fechaPublicacion", $current_date);
        $stmt->bindParam(":titulo", $_POST["titulo"]);
        $stmt->bindParam(":texto", $_POST["texto"]);
        $stmt->bindParam(":archivoAdjunto", $_POST["archivoAdjunto"]);
        $stmt->bindParam(":imagenAdjunta", $_POST["imagenAdjunta"]);
        $stmt->bindParam(":Topico_idTopico", $_POST["Topico_idTopico"]);
        $stmt->bindParam(":Usuario_idUsuario", $_SESSION["idUsuario"]);

        if ($stmt->execute()) {
            $message = "Se ha registro su post correctamente";
            $type = "success";
        } else {
            $message = "Hubo un problema al registrar su post";
            $type = "danger";
        }
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
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/question-style.css">
</head>

<body>
    <?php require "partials/user-navbar.php" ?>

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
                <form action="<?=$_SERVER["PHP_SELF"]?>" method="post" class="ask-form">

                    <!-- Mensaje de confirmacion de registro -->
                    <?php if (!empty($message)): ?>
                        <div class="alert alert-<?=$type?> alert-dismissible fade show" role="alert">
                            <?=$message?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <select class="form-control" name="Topico_idTopico">
                            <option class="hidden" selected disabled>Elija el tema</option>
                            <?php foreach($listaTopico as $topico): ?>
                                <option value="<?=$topico["idTopico"]?>"><?=$topico["nombre"]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="El titulo de su pregunta" required>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="texto" id="ask" cols="50" rows="10"
                            placeholder="Escriba su pregunta" required></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="col-8">
                            <label id="insert-label" for="upload-image upload-file">Insertar documentos:</label>
                        </div>
                        <div id="upload-image" class="upload col-2">
                            <label for="file-input">
                                <i class="fas fa-upload"></i>
                            </label>
                            <input id="file-input" type="file" name="archivoAdjunto">
                        </div>
                        <div id="upload-file" class="upload col-2">
                            <label for="image-input">
                                <i class="fas fa-images"></i>
                            </label>
                            <input id="image-input" type="file" accept="image/*" name="imagenAdjunta">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="Enviar" />
                    </div>
                </form>
                <!-- END FORM -->
            </div>
        </div>

        <?php require "partials/right-section.php" ?>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Popovers -->
    <script type="text/javascript" src="assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="assets/js/scripts/profile-popover.js"></script>
</body>

</html>
