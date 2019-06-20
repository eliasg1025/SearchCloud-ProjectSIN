<?php
    require 'database.php';

    $message = "";
    $type = "";

    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["telefono"]))
    {
        $conexion = abrirConexion();
        // Preparando la consulta
        $sql = "INSERT INTO `usuario` (`nombre`, `apellido`, `email`, `telefono`, `password`, `fechaNacimiento`, `Universidad_idUniversidad`, `Genero_idGenero`) VALUES (:nombre, :apellido, :email, :telefono, :pass, :fechaNacimiento, :idUniversidad, :idGenero)";
        $stmt = $conexion->prepare($sql);

        // Vinculando parametros
        $stmt->bindParam(":nombre", $_POST["nombre"]);
        $stmt->bindParam(":apellido", $_POST["apellido"]);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->bindParam(":telefono", $_POST["telefono"]);
        $stmt->bindParam(":pass", $_POST["password"]);
        $stmt->bindParam(":fechaNacimiento", $_POST["fechaNacimiento"]);
        $stmt->bindParam(":idUniversidad", $_POST["idUniversidad"]);
        $stmt->bindParam(":idGenero", $_POST["idGenero"]);


        if ($stmt->execute()) {
            $message = "Se ha creado un nuevo usuario satisfactorimente, ingrese <a href='login.php'>aqui</a>";
            $type = "success";
        } else {
            $message = "Hubo un problemas al crear el usuario";
            $type = "danger";
        }
    }
?>

<?php
    $conn = abrirConexion();
    $sqlUniv = "SELECT `idUniversidad`, `nombre` FROM `universidad`";
    $registrosUniv = $conn->prepare($sqlUniv);
    $registrosUniv->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
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

        <!-- Mensaje de confirmacion de registro -->
        <?php if (!empty($message)): ?>

            <div class="alert alert-<?=$type?> alert-dismissible fade show" role="alert">
                <?=$message?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>

        <div class="row">
            <div class="col-md-3 register-left">
                <img src="assets/img/animation-book.png" alt="" />
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
                        <a class="nav-link active" id="ocultarCardInfo" data-toggle="tab" href="#" role="tab" aria-selected="true">Free</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mostrarCardInfo"  data-toggle="tab" href="#" role="tab" aria-selected="false">Premium</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <h3 class="register-heading">Crea una cuenta</h3>
                    <!-- FORM -->
                    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>"  class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombres"  required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellido" class="form-control" placeholder="Apellidos" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email"  required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" maxlength="15" class="form-control" placeholder="Telefono" required>
                            </div>
                            <div class="form-group">
                                <label>Ingrese fecha de nacimiento</label>
                                <input type="date" name="fechaNacimiento" max="3000-12-31" min="1000-01-01" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Contraseña"  required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirma contraseña" required>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="idUniversidad" required>
                                    <option class="hidden" selected disabled>Selecciona tu universidad</option>

                                    <!-- Bucle para mostrar universidades -->
                                    <?php while($resultsUniv = $registrosUniv->fetch(PDO::FETCH_ASSOC)): ?>
                                        <option value="<?=$resultsUniv['idUniversidad']?>"> <?=$resultsUniv["nombre"]?> </option>
                                    <?php endwhile; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="idGenero" value="1" checked>
                                        <span>Hombre</span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="idGenero" value="2">
                                        <span>Mujer</span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="idGenero" value="3">
                                        <span>Otros</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="cardInfo" class="card-info container form-group" style="display: none;">
                            <fieldset>
                                <legend>Datos de tarjeta</legend>
                                <input type="text" class="form-control card-info-fields" placeholder="Numero de tarjeta " value="" maxlength="12">
                                <div class="select-container">
                                    <select class="form-control card-info-fields">
                                        <option class="hidden" selected disabled>MM</option>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                        <option value="7">07</option>
                                        <option value="8">08</option>
                                        <option value="9">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                    <select class="form-control card-info-fields">
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
                                <input type="text" class="form-control card-info-fields" placeholder="CVV"  maxlength="4">
                                <input type="text" class="form-control card-info-fields" placeholder="Nombre del titular">
                            </fieldset>
                        </div>
                        <input type="submit" class="btnRegister" value="Registrar">
                    </form>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $("#ocultarCardInfo").on("click", function() {
                $("#cardInfo").hide(500);
                $(".card-info-fields").attr("required",false);
            });
            $("#mostrarCardInfo").on("click", function() {
                $("#cardInfo").show(500);
                $(".card-info-fields").attr("required",true);
            });
        });
    </script>
</body>

</html>
