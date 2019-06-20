<?php
    session_start();

    require "database.php";
    require "models/admin-usuario.php";
    require "models/admin-post.php";
    require "models/admin-respuestas.php";
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
    if (!isset($_GET["Post_idPost"])) {
        header("Location: main.php");
    }
 ?>

<?php
    $getById = new GetById($conexion);

    $adminPost = new AdminPost($conexion);
    $thisPost = $adminPost->getPostById($_GET["Post_idPost"]);

    $adminRespuestas = new AdminRespuesta($conexion);
    $arrayRespuestas = $adminRespuestas->getRespuestasByIdPost($_GET["Post_idPost"]);
?>

<?php
    if (isset($_POST["texto"]))
    {
        $sql = "INSERT INTO `respuesta` (`fechaPublicacion`, `texto`, `archivoAdjunto`, `imagenAdjunta`, `Calificacion_idCalificacion`, `Usuario_idUsuario`, `Post_idPost`) VALUES (:fechaPublicacion, :texto, :archivoAdjunto, :imagenAdjunta, :Calificacion_idCalificacion, :Usuario_idUsuario, :Post_idPost)";
        $stmt = $conexion->prepare($sql);

        //Vinculando parametros
        date_default_timezone_set('America/Lima');
        $current_date = date("Y-m-d H:i:s");
        $calification = "3";
        $idPost = $thisPost->getIdPost();

        $stmt->bindParam(":fechaPublicacion", $current_date);
        $stmt->bindParam(":texto", $_POST["texto"]);
        $stmt->bindParam(":archivoAdjunto", $_POST["archivoAdjunto"]);
        $stmt->bindParam(":imagenAdjunta", $_POST["imagenAdjunta"]);
        $stmt->bindParam(":Calificacion_idCalificacion", $calification);
        $stmt->bindParam(":Usuario_idUsuario", $_SESSION["idUsuario"]);
        $stmt->bindParam(":Post_idPost", $_GET["Post_idPost"]);

        if ($stmt->execute()) {
            header("Location: answer-question.php?Post_idPost=$idPost");
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
    <title>SearchCloud</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/ask-style.css">
</head>

<body>
    <?php require 'partials/user-navbar.php'; ?>

    <!---------------------- LAYOUT ----------------------->

    <div class="layout-container">
        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <!-- MAIN QUESTION -->

            <div class="main-question card m-3">
                <div class="card-body">
                    <span class="badge badge-pill badge-primary"><?=$getById->getNombreTopico($thisPost->getTopico_idTopico())?></span>
                    <h6 class="card-title">
                        <i class="fas fa-user-circle"></i> <?=$getById->getNombreUsuario($thisPost->getUsuario_idUsuario())?> | <?=$thisPost->getFechaPublicacion()?>

                        <?php if (!empty($thisPost->getArchivoAdjunto())): ?>
                            <span style="font-size: 25px;" class="file-include">
                                <button type="button" name="button">
                                    <i class="far fa-file"></i>
                                </button>
                            </span>
                        <?php endif; ?>
                    </h6>
                    <h5 class="card-title entry-title"><?=$thisPost->getTitulo()?></h5>
                    <p class="card-text"><?=$thisPost->getTexto()?></p>

                    <?php if(!empty($thisPost->getImagenAdjunto())): ?>
                        <div class="image-container text-center">
                            <img class="question-image img-fluid rounded"
                                src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                                alt="img-question">
                        </div>
                    <?php endif; ?>

                </div>
                <div class="card-footer text-muted">
                    <?php if (empty($thisPost->getArchivoAdjunto())): ?>
                        No hay documento adjunto
                    <?php else: ?>
                        Si hay documento disponible
                    <?php endif; ?>
                </div>
            </div>


            <section class="anwser-section card m-3">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-white">
                        Respuestas
                    </h4>
                    <!-- YOUR ANWSER-->
                    <div class="card text-center">
                        <img src="assets/img/background-search.jpg" class="card-img-top" alt="..." style="height: 200px;">

                        <div class="card-body">
                            <h5 class="card-title">Es tu oportunidad</h5>
                            <p class="card-text">¿Sabes la respuesta a esta pregunta? Animate a contribuir con los demas
                            </p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Resolver esta pregunta
                            </button>
                        </div>
                    </div>
                    <br>
                    <!-- ANWSER FORM -->
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form action="<?=$_SERVER["PHP_SELF"]?>?Post_idPost=<?=$_GET["Post_idPost"]?>" method="POST">
                                <div class="form-group">
                                    <label for="your-anwser" class="col-sm-4 col-form-label">Su respuesta:</label>
                                    <textarea class="form-control" id="your-anwser" cols="50"
                                        rows="10" placeholder="" name="texto" required></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <label id="insert-label" for="upload-image upload-file">Insertar
                                            documentos:</label>
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
                                    <input type="submit" class="form-control btn btn-success" value="Enviar" />
                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                    <!-- END FORM -->
                    <br>

                    <!-- ANOTHER AWNSERS -->
                    <?php if(sizeof($arrayRespuestas) == 0): ?>
                        <p>No hay respuestas</p>
                    <?php else: ?>
                        <?php foreach ($arrayRespuestas as $respuesta): ?>
                            <div class="anwser card">
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <i class="fas fa-user-circle"></i> <?=$getById->getNombreUsuario($respuesta->getUsuario_idUsuario())?> | <?=$respuesta->getFechaPublicacion()?>
                                        <span style="font-size: 25px;" class="file-include">
                                            <i class="far fa-file"></i>
                                        </span>
                                    </h6>

                                    <p class="card-text">
                                        <span style="font-weight: bold;">Calificacion: </span>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </p>
                                    <p class="card-text">
                                        <?=$respuesta->getTexto()?>
                                    </p>
                                    <?php if($respuesta->getImagenAdjunta() != null): ?>
                                        <div class="image-container text-center">
                                            <img class="question-image img-fluid rounded"
                                                src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                                                alt="img-question">
                                        </div>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <br>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </section>
            <!-- PAGINATION -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>

        <?php require 'partials/right-section.php'; ?>
    </div>


    <!-- BOOTSTRAP JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Cambiar a la clase .active un elemento del .list-group -->
    <script type="text/javascript">
        $(document).ready(showSubject);

        function showSubject() {
            $(".list-group").on("click", function () {
                var active = $(".active").text();
                $("#subjects-button").text(active);
            });
        }
    </script>

    <!-- Popovers -->
    <script type="text/javascript" src="assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="assets/js/scripts/profile-popover.js"></script>

</body>

</html>
