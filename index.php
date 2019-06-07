<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/index-style.css">
    <link rel="stylesheet" href="assets/css/custom/carosuel-style.css">
</head>

<body>
    <?php require "partials/nouser-navbar.php" ?>

    <!-- HEADER -->
    <header class="main-header">
        <div class="background-overlay text-white py-5">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h1 class="display-1 title">SearchCloud</h1>
                        <p class="lead">Aprende más fácil mediante una búsqueda efectiva al alcance de tus manos</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- SEARCH BAR -->
    <div class="container search-section">
        <div class="search-overlay text-white">
            <h2 class="h1 text-center py-5">¿Que deseas averiguar?</h2>
            <div class="pb-5">
                <div class="container h-100">
                  <div class="d-flex justify-content-center h-100">
                    <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Ingresa palabra clave">
                        <a href="main/index.html?user=null" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                  </div>
                </div>
            </div>
        </div>

    </div>


    <!-- CAROUSEL -->
    <section class="carousel-section py-5">
        <div class="container">
            <h2 class="h1 text-center">Temas principales</h2>

            <div class="thumbnail-carousel slider">
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img class="card-img-top img-fluid" src="assets/img/carousel-icons/032-mathematics.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Matematicas</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/008-chemistry.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Quimica</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/006-biology.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Biologia</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/012-physics.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Fisica</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/036-engineering.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Ingenieria</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/007-law.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Derecho</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/024-computer.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Informatica</h4>
                        </div>
                    </a>
                </div>
                <div class="slide">
                    <a href="main/index.html?user=null">
                        <img src="assets/img/carousel-icons/016-economy.png">
                        <div class="card-block">
                            <h4 class="card-title text-center">Economia</h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- IMAGE SHOWCASES -->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/showcase1.jpg');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Comparte y Envia</h2>
                    <p class="lead mb-0">Tus dudas, consultas, problemas ó cualquier inquietud acerca de cualquier tema académico que necesitas ó desees saber</p>
                    <div class="btn-conainer p-4 text-center">
                        <a class="btn btn-info btn-block btn-lg" href="main/index.html?user=null" role="button">Ver Foro</a>
                    </div>

                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/showcase2.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Sube y Descarga</h2>
                    <p class="lead mb-0">Documentos, imágenes, pdf y artículos que resuelvan lo que estes buscando</p>
                </div>
            </div>
        </div>
    </section>
    <!-- END IMAGE SHOWCASES -->

    <!-- BOOTSTRAP JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Libreria "Slick-carousel" necesaria para que funcione el carrusel de imagenes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <!-- CUSTOM JS (Javascript personalizado)-->
    <script src="assets/js/scripts/carousel.js"></script> <!-- Este JS incluye los datos personalizados para que funcione el carrusel -->
    <script src="assets/js/scripts/navbar.js"></script>
</body>

</html>
