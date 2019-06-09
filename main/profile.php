<?php

session_start();

require "../database.php";
require "../models/usuario.php";

if (isset($_SESSION['idUsuario'])) {

    $usuario = new Usuario($_SESSION["idUsuario"]);

} else {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud | Perfil</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="../assets/css/custom/profile-style.css">
</head>

<body>
    <?php require "../partials/user-navbar.php" ?>

    <!---------------------- LAYOUT ----------------------->


    <div class="layout-container">
        <div class="left-section p-3">
            <div class="card">
                <img src="https://i.pinimg.com/originals/51/dc/0b/51dc0bd8377c89db379af700e9a7a1a2.jpg" alt="" class="card-img-top img-fluid">
                <div class="card-body">
                    <h3 class="card-title name-user">
                        Elias Guere
                    </h3>
                    <h3 class="card-title">
                        <small class="text-muted">Universidad de Piura</small>
                    </h3>
                    <div class="container text-center mt-3">
                        <a href="falta-pagina.php" class="btn btn-secondary">Editar perfil</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="rigth-section p-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Perfil de usuario
                    </h2>
                    <br>
                    <!-- Informacion personal -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informacion personal</h4>
                            <br>
                            <div class="row">
                                <div class="card-text col">
                                    <p><span style="font-weight: bold;">Nombre y Apellidos:</span> Elias Guere Canchucaja</p>
                                    <p><span style="font-weight: bold;">Centro de estudios:</span> Universidad de Piura</p>
                                    <p><span style="font-weight: bold;">Correo electronico:</span> eliasguere1025@gmail.com</p>
                                </div>
                                <div class="card-text col">
                                    <p><span style="font-weight: bold;">Fecha de naciminto:</span> 1997-06-25</p>
                                    <p><span style="font-weight: bold;">Numero telefonico:</span> 123456789</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--  -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Datos de la cuenta</h4>
                            <br>
                            <div class="row">
                                <div class="card-text col">
                                    <p><span style="font-weight: bold;">Usuario Premium:</span> SI</p>
                                    <p><span style="font-weight: bold;">Cantidad de preguntas realizadas:</span> 4</p>
                                    <p><span style="font-weight: bold;">Cantidad de respuestas:</span> 5</p>
                                </div>
                                <div class="card-text col">
                                    <p><span style="font-weight: bold;">Archivos subidos:</span> 2</p>
                                    <p><a href="index.php">Cambiar a premium</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-conainer p-4">
                        <a class="btn btn-info btn-lg" href="index.php" role="button">Volver al Foro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- BOOTSTRAP JS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- Cambiar a la clase .active un elemento del .list-group -->
    <script type="text/javascript">
        $(document).ready(showSubject);

        function showSubject() {
            $(".list-group").on("click", function() {
                var active = $(".active").text();
                $("#subjects-button").text(active);
            });
        }
    </script>

    <!-- Popovers -->
    <script type="text/javascript" src="../assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="../assets/js/scripts/profile-popover.js"></script>

</body>

</html>
