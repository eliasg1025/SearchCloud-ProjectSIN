<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud | Respositorio</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="../assets/css/custom/ask-style.css">
</head>

<body>
    <?php require "../partials/user-navbar.php" ?>

    <!-- LAYOUT -->
    <div class="layout-container">

        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <div class="container title-container">
                <h2 class="text-white">Sube tus archivos</h2>
            </div>

            <!-- FORM CONTAINER -->
            <div class="ask-container">
                <!-- register-right -->
                <!-- FORM -->
                <form action="index.php" method="" class="ask-form">
                    <!-- register-form -->
                    <div class="form-group">
                        <label for="seccion">Selecciona el tema:</label>
                        <select id="seccion" class="form-control">
                            <option class="hidden" selected disabled>-----</option>
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
                        <div class="form-group">
                            <label for="institucion">Selecciona la institucion de procedencia</label>
                            <select id="institucion" class="form-control" required>
                                <option class="hidden" selected disabled>-----</option>
                                <option>Pontificia Universidad Católica del Perú</option>
                                <option>Universidad Peruana Cayetano Heredia</option>
                                <option>Universidad Nacional Mayor de San Marcos</option>
                                <option>Universidad Nacional Agraria La Molina</option>
                                <option>Universidad Nacional de Ingeniería</option>
                                <option>Universidad Nacional San Antonio Abad del Cusco</option>
                                <option>Universidad Nacional de Trujillo</option>
                                <option>Universidad Científica del Sur</option>
                                <option>Universidad de Piura</option>
                                <option>Universidad del Pacífico</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="ask" id="ask" cols="50" rows="5"
                            placeholder="Escribe un resumen del documento (Maximo 200 caracteres)"
                            maxlength="200"></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="input-autor" class="col-sm-4 col-form-label">Ingrese nombre del autor:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-autor" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-file">Seleccione el documento (Solo PDF):</label>
                        <input type="file" class="form-control-file" id="input-file" accept="application/pdf">
                    </div>

                    <div class="container p-0 mt-5">
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Subir" />
                        </div>
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
