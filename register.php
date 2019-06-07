<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SearchCloud | Registro</title>
    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/register-style.css">
</head>

<body>
    <?php require "partials/nouser-navbar.php" ?>

    <!-- REGISTER SECTION -->
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="img/animation-book.png" alt="" />
                <h3>Crea una cuenta</h3>
                <p>¿Ya estas registrado?</p>
                <a href="login.php" class="btn">
                    Ingresa
                </a>
                <br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Free</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Premium</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Crea una cuenta Gratuita</h3>
                        <!-- FORM -->
                        <form action="main.html" method="" class="row register-form" onsubmit="return checkPass(this);">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombres" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Apellidos" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone"
                                        class="form-control" placeholder="Telefono" value="" required>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese fecha de nacimiento</label>
                                    <input type="date" name="bday" max="3000-12-31" min="1000-01-01"
                                        class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" placeholder="Contraseña"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_pass"
                                        placeholder="Confirmar contraseña" value="" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" required>
                                        <option class="hidden" selected disabled>Selecciona tu universidad</option>
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
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span>Hombre</span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Mujer</span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="other">
                                            <span>Otros</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btnRegister" value="Registrar" />
                        </form>
                        <!-- END FORM -->
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Crea una cuenta Premium</h3>
                        <!-- FORM -->
                        <form action="main.html" method="" class="row register-form" onsubmit="return checkPass(this);">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nombres" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Apellidos" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" maxlength="10" minlength="10" class="form-control"
                                        placeholder="Telefono" value="" required>
                                </div>
                                <div class="form-group">
                                    <label>Ingrese fecha de nacimiento</label>
                                    <input type="date" name="bday" max="3000-12-31" min="1000-01-01"
                                        class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Contraseña" value=""
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirma contraseña"
                                        value="" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" required>
                                        <option class="hidden" selected disabled>Selecciona tu universidad</option>
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
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="male" checked>
                                            <span>Hombre</span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="female">
                                            <span>Mujer</span>
                                        </label>
                                        <label class="radio inline">
                                            <input type="radio" name="gender" value="other">
                                            <span>Otros</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-info container form-group">
                                <fieldset>
                                    <legend>Datos de tarjeta</legend>
                                    <input type="text" class="form-control" placeholder="Numero de tarjeta " value=""
                                        maxlength="12" required>
                                    <div class="select-container">
                                        <select class="form-control" required>
                                            <option class="hidden" selected disabled>MM</option>
                                            <option>01</option>
                                            <option>02</option>
                                            <option>04</option>
                                            <option>05</option>
                                            <option>06</option>
                                            <option>07</option>
                                            <option>08</option>
                                            <option>09</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                        <select class="form-control" required>
                                            <option class="hidden" selected disabled>AAAA</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                            <option value="2032">2032</option>
                                            <option value="2033">2033</option>
                                            <option value="2034">2034</option>
                                            <option value="2035">2035</option>
                                            <option value="2036">2036</option>
                                            <option value="2037">2037</option>
                                            <option value="2038">2038</option>
                                            <option value="2039">2039</option>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control" placeholder="CVV" value="" maxlength="4"
                                        required>
                                    <input type="text" class="form-control" placeholder="Nombre del titular" value=""
                                        required>
                                </fieldset>
                            </div>
                            <input type="submit" class="btnRegister" value="Registrar">
                        </form>
                        <!-- END FORM -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Javascript para confirmar la contraseña de mentiritas -->
    <script type="text/javascript">

        function checkPass(my_form) {
            if (my_form.pass.value != my_form.confirm_pass.value) {
                alert('La contra no esta igual escribela bien pe');
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>