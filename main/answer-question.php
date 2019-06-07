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
    <link rel="stylesheet" href="../assets/css/custom/ask-style.css">
</head>

<body>
    <?php require '../partials/user-navbar.php'; ?>

    <!---------------------- LAYOUT ----------------------->

    <div class="layout-container">
        <!-- LEFT SECTION -->
        <div class="left-section p-3">
            <!-- MAIN QUESTION -->
            <div class="main-question card m-3">
                <div class="card-body">
                    <span class="badge badge-pill badge-primary">Quimica</span>
                    <h6 class="card-title">
                        <i class="fas fa-user-circle"></i> username1 | Hoy - 21:30
                        <span style="font-size: 25px;" class="file-include">
                            <i class="far fa-file"></i>
                        </span>
                    </h6>
                    <h5 class="card-title entry-title">Calcular entalpia de la reaccion</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi fugiat ab
                        sunt
                        veniam quasi laboriosam. Expedita et repellendus accusantium quas?</p>

                    <div class="image-container text-center">
                        <img class="question-image img-fluid rounded"
                            src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                            alt="img-question">
                    </div>

                </div>
                <div class="card-footer text-muted">
                    No hay documento adjunto
                </div>
            </div>

            <section class="anwser-section card m-3">
                <div class="card-body">
                    <h4 class="card-title mb-4 text-white">
                        Respuestas
                    </h4>
                    <!-- YOUR ANWSER-->
                    <div class="card text-center">
                        <img src="../assets/img/background-search.jpg" class="card-img-top" alt="..." style="height: 200px;">

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
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="your-anwser" class="col-sm-4 col-form-label">Su respuesta:</label>
                                    <textarea class="form-control" name="your-anwser" id="your-anwser" cols="50"
                                        rows="10" placeholder="">
                                </textarea>
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
                                    <input type="submit" class="form-control btn btn-success" value="Enviar" />
                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                    <!-- END FORM -->
                    <br>

                    <!-- ANOTHER AWNSERS -->
                    <div class="anwser card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-user-circle"></i> Username2 | Hoy 22:30
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi possimus similique
                                cupiditate
                                ducimus nihil sit optio necessitatibus molestias iure tempore.
                            </p>
                            <div class="image-container text-center">
                                <img class="question-image img-fluid rounded"
                                    src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                                    alt="img-question">
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="anwser card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-user-circle"></i> Username2 | Hoy 22:30
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi possimus similique
                                cupiditate
                                ducimus nihil sit optio necessitatibus molestias iure tempore.
                            </p>
                            <div class="image-container text-center">
                                <img class="question-image img-fluid rounded"
                                    src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                                    alt="img-question">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="anwser card">
                        <div class="card-body">
                            <h6 class="card-title">
                                <i class="fas fa-user-circle"></i> Username2 | Hoy 22:30
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi possimus similique
                                cupiditate
                                ducimus nihil sit optio necessitatibus molestias iure tempore.
                            </p>
                            <div class="image-container text-center">
                                <img class="question-image img-fluid rounded"
                                    src="https://lidiaconlaquimica.files.wordpress.com/2015/06/entalpia-ejercicio-11.png?w=620"
                                    alt="img-question">
                            </div>
                        </div>
                    </div>
                    <br>
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

        <?php require '../partials/right-section.php'; ?>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('.notification-popover').popover({
                title: "<h6 class='text-center'>Notifiaciones</em></h6>",
                content: "<p> No hay notificaciones </p>",
                html: true
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.user-popover').popover({
                title: "<h6 class='text-center'>Hola <em>Pedrito</em></h6>",
                content: "<a href='profile.html' class='text-center'>Ver Perfil</a> <br> <a href='index.html' class='text-center'>Cerrar sesion</a>",
                html: true
            });
        });
    </script>

</body>

</html>