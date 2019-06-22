<?php
    session_start();

    require "database.php";
    require "models/admin-usuario.php";
    require "models/admin-post.php";
    require "models/admin-topico.php";
    require "functions/get-functions.php";
    require 'functions/pagination.php';
    require "functions/active.php";

    $conexion = abrirConexion();
?>

<?php
    if (isset($_SESSION['idUsuario'])) {

        $adminUsuario = new AdminUsuario($conexion);
        $usuario = $adminUsuario->getUsuarioById($_SESSION["idUsuario"]);

    } else {
        header("Location: /login.php");
    }
?>

<?php
    $paginationValues = getPaginationValues();
    $start = $paginationValues["start"];
    $items_by_page = $paginationValues["items_by_page"];
?>

<?php
    $adminPost = new AdminPost($conexion);
    $cantidadRespuestas = $adminPost->getCantidadRespuestasPorPost();

    if (!isset($_GET["Topico_idTopico"])) {
        $_GET["Topico_idTopico"] = 0;
    }

    if (!isset($_POST["filtro_orden"]) || $_POST["filtro_orden"] == "desc"){
        $postEntries = $adminPost->getPostByDateDESC($_GET["Topico_idTopico"], $start, $items_by_page);
    } else {
        $postEntries = $adminPost->getPostByDateASC($_GET["Topico_idTopico"], $start, $items_by_page);
    }

    $total_pages = $adminPost->getTotalPages($_GET["Topico_idTopico"], $items_by_page);
?>

<?php $getById = new GetById($conexion); ?>

<?php
    $adminTopico = new AdminTopico($conexion);
    $listaTopico = $adminTopico->getListaTopico();
?>

<?php
    if (!isset($_GET["Topico_idTopico"])) {
        $pagina_url = "?pagina=";
    } else {
        $pagina_url = "?Topico_idTopico=".$_GET["Topico_idTopico"]."&pagina=";
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
    <link rel="stylesheet" href="assets/css/custom/main-style.css">
</head>

<body>
    <?php require "partials/user-navbar.php" ?>

    <!---------------------- LAYOUT ----------------------->
    <div class="layout-container">

        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <button id="subjects-button" class="btn btn btn-outline-light btn-block" type="button"
                data-toggle="collapse" data-target="#subjects-list" aria-expanded="false" aria-controls="subjects-list">
                Todas las asignaturas
            </button>

            <div class="list-group collapse" id="subjects-list" role="tablist">
            	<?php if(!isset($_GET["Topico_idTopico"])):?>
                    <a href="main.php" class="list-group-item list-group-item-action active">
                    	Todas las asignaturas
                	</a>
            	<?php else:?>
            		<a href="main.php" class="list-group-item list-group-item-action <?=isActive(0, $_GET["Topico_idTopico"])?>">
                    	Todas las asignaturas
                	</a>
            	<?php endif;?>

                <?php foreach($listaTopico as $topico): ?>
                	<a href="main.php?Topico_idTopico=<?=$topico["idTopico"]?>" class="list-group-item list-group-item-action <?=isActive($topico["idTopico"], $_GET["Topico_idTopico"])?>">
                		<?=$topico["nombre"]?>
            		</a>
                <?php endforeach; ?>

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

            	<!-- Filtro de orden de posts -->
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="container mt-3 row">
                    <label for="entries-filter" class="text-white col-sm-3 col-form-label">
                        Ordenar por:
                    </label>
                    <select id="entries-filter" name="filtro_orden" class="form-control col-sm-5">
                        <option value="desc" selected>Mas recientes</option>
                        <option value="asc">Mas antiguas</option>
                    </select>

                    <input type="submit" value="►" class="btn btn-outline-light col-sm-1">
                </form>

                <!-- Filtro de busqueda -->
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="container mt-3 row">
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
                </form>

            </section>
            <!-- END FILTER BUTTONS -->

            <!-- ENTRIES -->
            <section class="entries">
				<!-- Bucle para repetir todos los post -->
                <?php foreach ($postEntries as $entry): ?>
                    <div class="entry card m-3">
                        <div class="card-body">
                            <span class="badge badge-pill badge-primary"><?=$getById->getNombreTopico($entry->getTopico_idTopico())?></span>
                            <h6 class="card-title">
                                <i class="fas fa-user-circle"></i> <?=$getById->getNombreUsuario($entry->getUsuario_idUsuario())?> | <?=$entry->getFechaPublicacion()?>
                            </h6>
                            <h5 class="card-title entry-title"><?=$entry->getTitulo()?></h5>
                            <p class="card-text"> <?=$entry->getTexto()?> </p>
                            <a href="answer-question.php?Post_idPost=<?=$entry->getIdPost()?>" class="btn btn-primary">Resolver</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="fas fa-flag"></i>
                            	<?php
                                	if (!empty($cantidadRespuestas[$entry->getIdPost()])) {
                            	       echo $cantidadRespuestas[$entry->getIdPost()] . " Respuestas";
                                	} else {
                                	    echo "0 Respuestas";
                                	}
                            	?>
                            </small>
                        </div>
                    </div>
                <?php endforeach; ?>

            </section>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <!-- <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true">Previous</a></li> -->
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    	<!-- Falta que reconozca el actual url y añada la varibale GET -->
                        <li class="page-item <?=isActivePage($i, $_GET['pagina'])?>"><a class="page-link" href="main.php<?=$pagina_url.$i?>"><?=$i?></a></li>
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
