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
    <link rel="stylesheet" href="assets/css/custom/falta-pagina-style.css">
</head>

<body>
    <?php require 'partials/user-navbar.php'; ?>

    <!-- LAYOUT -->
    <div class="layout-container text-white">
        <div class="text-container text-center">
            <h2>Lo siento</h2>
            <h2>Somos flojos y esta pagina todavia no existe</h2>
            <span style="font-size: 100px;">
                <i class="fas fa-sad-tear"></i>
            </span>
        </div>
        <div class="button-container text-center">
            <button class="btn btn-light btn-lg" onclick="regresarPagina()"><i class="fas fa-chevron-left"></i> Regresar</button>
        </div>

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Popovers -->
    <script type="text/javascript" src="assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="assets/js/scripts/profile-popover.js"></script>

    <script type="text/javascript">
        function regresarPagina() {
            window.history.back();
        }
    </script>
</body>

</html>
