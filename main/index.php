<?php
    session_start();

    require "../database.php";
    require "../models/admin-usuario.php";
    require "../models/admin-post.php";
    require "../controllers/static-methods.php";

    $conexion = abrirConexion();
?>

<?php
    if (isset($_SESSION['idUsuario'])) {

        $adminUsuario = new AdminUsuario($conexion);
        $usuario = $adminUsuario->getUsuarioById($_SESSION["idUsuario"]);

    } else {
        header("Location: ../login.php");
    }
?>

<?php
    $adminPost = new AdminPost($conexion);
    $postEntries = $adminPost->getPostByDateDESC();
?>

<?php $getById = new GetById($conexion); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="../assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="../assets/css/custom/main-style.css">
</head>

<body>
    <?php require "../partials/user-navbar.php" ?>

    <!---------------------- LAYOUT ----------------------->
    <div class="layout-container">

        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <button id="subjects-button" class="btn btn btn-outline-light btn-block" type="button"
                data-toggle="collapse" data-target="#subjects-list" aria-expanded="false" aria-controls="subjects-list">
                Todas las asignaturas
            </button>

            <div class="list-group collapse" id="subjects-list" role="tablist">
                <button type="button" class="list-group-item list-group-item-action active" data-toggle="list"
                    role="tab" aria-controls="home">Todas las asignaturas</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="profile">Matematicas</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="messages">Quimica</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Biologia</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Fisica</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Ingenieria</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Derecho</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Informatica</button>
                <button type="button" class="list-group-item list-group-item-action" data-toggle="list" role="tab"
                    aria-controls="settings">Economia</button>
            </div>
        </div>
        <!-- MIDDLE SECTION  -->
        <div class="middle-section p-3">

            <?php if(!empty($usuario->getTarjeta_idTarjeta())):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usted <strong>SI</strong> es usuario premium.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else:?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Usted aun <strong>NO</strong> es usuario premium.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif;?>

            <!-- WELCOME SECTION-->
            <div class="card text-center">
                <div class="card-header">
                    <span style="font-size: 23px;">
                        <i class="fas fa-door-open"></i>
                    </span>
                    Bienvenido <span id="nombre-usuario" style="font-weight: bold;"><?=$usuario->getNombre()?></span>
                </div>
                <div class="card-body">
                    <span id="animation-icon" style="font-size: 30px;">
                        <i class="fas fa-graduation-cap"></i>
                    </span>
                    <h5 class="card-title">¿Que deseas averiguar?</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="question.php" class="btn btn-primary">Preguntar</a>
                </div>
            </div>

            <!-- FILTER BUTTONS --->
            <section class="filter-buttons mt-4">
                <div class="container mt-3 row">
                    <label for="entries-filter" class="text-white col-sm-3 col-form-label">
                        Ordenar por:
                    </label>
                    <select id="entries-filter" class="form-control col-sm-6">
                        <option class="hidden" selected>Mas recientes</option>
                        <option value="">Mas antiguas</option>
                        <option value="">Mas relevantes</option>
                    </select>
                </div>
                <div class="container mt-3 row">
                    <label for="search-filter" class="text-white col-sm-3 col-form-label">
                        Buscar por:
                    </label>
                    <div class="input-group col-sm-6" style="padding: 0;">
                        <input id="search-filter" type="text" class="form-control" placeholder="Ingrese palabra clave"
                            aria-label="Ingrese palabra clave" aria-describedby="button-search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" id="button-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ENTRIES -->
            <section class="entries">

                <?php foreach ($postEntries as $entry): ?>
                    <div class="entry card m-3">
                        <div class="card-body">
                            <span class="badge badge-pill badge-primary"><?=$getById->getNombreTopico($entry->getTopico_idTopico())?></span>
                            <h6 class="card-title">
                                <i class="fas fa-user-circle"></i> <?=$getById->getNombreUsuario($entry->getUsuario_idUsuario())?> | <?=$entry->getFechaPublicacion()?>
                            </h6>
                            <h5 class="card-title entry-title"><?=$entry->getTitulo()?></h5>
                            <p class="card-text"> <?=$entry->getTexto()?> </p>
                            <a href="answer-question.php" class="btn btn-primary">Resolver</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="fas fa-flag"></i> 3 respuestas </small>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>

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

        <?php require "../partials/right-section.php" ?>
    </div>



    <!-- BOOTSTRAP JS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

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
    <script type="text/javascript" src="../assets/js/scripts/notification-popover.js"></script>
    <script type="text/javascript" src="../assets/js/scripts/profile-popover.js"></script>

</body>

</html>
