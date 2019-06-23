<?php
    session_start();

    require "database.php";
    require "models/admin-usuario.php";
    require "models/admin-archivorepo.php";
    require "functions/get-functions.php";
    require "functions/pagination.php";
    require "functions/active.php";

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
    $paginationValues = getPaginationValues();
    $start = $paginationValues["start"];
    $items_by_page = $paginationValues["items_by_page"];
?>

<?php
    $getById = new GetById($conexion);
?>

<?php
    $adminRepo = new AdminArchivoRepo($conexion);
    $arrayArchivos = $adminRepo->getAllArchivosRepo($start, $items_by_page);

    $total_pages = $adminRepo->getTotalPages($items_by_page);
 ?>

 <?php
    if (!isset($_GET["pagina"])) {
        $_GET["pagina"] = 1;
    }
  ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud | Repositorio</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/repository-style.css">
</head>

<body>
    <?php require "partials/user-navbar.php" ?>

    <!-- LAYOUT -->
    <div class="layout-container">

        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <div class="title-container">
                <h2 class="text-white">Respositorio de archivos</h2>
            </div>


            <div class="container to-upload mt-4">
                <div class="right-side">
                    <div class="overlay">
                        <div class="item text-center">
                            <a href="upload-files.php" style="text-decoration: none;">
                                <span style="font-size: 48px; color: white">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                                <p class="text-white h5">Subir archivos</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="left-side card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Colabora</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>

            <!-- FILTER BUTTONS --->
            <section class="filter-buttons mt-5">
                <!-- <div class="container mt-3 row">
                    <label for="entries-filter" class="text-white col-sm-3 col-form-label">
                        Ordenar por:
                    </label>
                    <select id="entries-filter" class="form-control col-sm-6">
                        <option value="desc">Mas recientes</option>
                        <option value="asc">Mas antiguas</option>
                    </select>
                </div> -->
                <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" class="container mt-3 row">
                    <label for="search-filter" class="text-white col-sm-3 col-form-label">
                        Buscar por:
                    </label>
                    <div class="input-group col-sm-6" style="padding: 0;">
                        <input id="search-filter" type="text" class="form-control" placeholder="Ingrese palabra clave"
                            aria-label="Ingrese palabra clave" aria-describedby="button-search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="submit" id="button-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </section>

            <!-- ARCHIVOS DEL REPOSITORIO -->
            <section class="repo-entries mt-5">
                <?php foreach($arrayArchivos as $archivo): ?>
                    <div class="repo-entry card m-3">
                        <div class="card-body">
                            <span class="badge badge-pill badge-primary"><?=$archivo->getNombreTopico()?></span>
                            <span class="badge badge-pill badge-success"><?=$archivo->getNombreUniversidad()?></span>
                            <h5 class="card-title entry-title mt-2"><?=$archivo->getTitulo()?></h5>
                            <p class="card-text"><?=$archivo->getResumen()?></p>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#view-file-modal-<?=$archivo->getIdArchivoRepo()?>"><i
                                    class="fas fa-search"></i> Ver</button>
                            <button class="btn btn-primary popover-dismiss download" role="button" data-toggle="popover"
                                data-trigger="focus" title="" data-content="No es usuario premium" data-placement="right">
                                <i class="fas fa-download"></i> Descargar
                            </button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Subido por <?=$archivo->getNombreUsuario()?> / <?=$archivo->getFechaPublicacion()?></small>
                        </div>
                    </div>
                    <!-- MODAL FILES -->
                    <div class="modal fade" id="view-file-modal-<?=$archivo->getIdArchivoRepo()?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"><?=$archivo->getTitulo()?></h4>
                                    <span class="badge badge-pill badge-primary"><?=$archivo->getNombreTopico()?></span>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="h6">Subido por:</p>
                                            <p><?=$archivo->getNombreUsuario()?></p>
                                        </div>
                                        <div class="col">
                                            <p class="h6">Fecha de subida:</p>
                                            <p><?=$archivo->getFechaPublicacion()?></p>
                                        </div>
                                    </div>

                                    <p class="h6">Institucion:</p>
                                    <p><?=$archivo->getNombreUniversidad()?></p>
                                    <p class="h6">Resumen:</p>
                                    <p><?=$archivo->getResumen()?></p>
                                    <p class="h6">Autor: </p>
                                    <p>Anonimo</p>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Previous</a></li> -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?=isActivePage($i, $_GET['pagina'])?>"><a class="page-link" href="repository.php?pagina=<?=$i?>"><?=$i?></a></li>
                    <?php endfor; ?>
                    <!-- <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                </ul>
            </nav>

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

    <script type="text/javascript">
        $(document).ready(function () {
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        });
    </script>
</body>

</html>
