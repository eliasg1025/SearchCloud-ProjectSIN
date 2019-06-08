<?php
    session_start();

    if (isset($_SESSION['idUsuario'])) {
        header('Location: /Projects/SearchCloud-ProjectSIN/index.php');
    }

    require "database.php";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $records = $conn->prepare('SELECT `idUsuario`, `email`, `password` FROM `modelosin`.`usuario` WHERE `email` = :email;');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $message = '';
        if (count($results) > 0 && $results["password"]==$_POST["password"]) {
            $_SESSION['user_id'] = $results['idUsuario'];
            header("Location: /Projects/SearchCloud-ProjectSIN/main/index.php");
        } else {
            $message = 'Sorry, Email o contraseña incorrectos';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SearchCloud | Login</title>
	<!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/logo.png" />
	<!-- BOOTSTRAP CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
	<!-- CUSTOM CSS (css personalizado) -->
    <link rel="stylesheet" href="assets/css/custom/login-style.css">
</head>
<body>
	<?php require "partials/nouser-navbar.php" ?>

	<div class="container login-container">

            <div class="login-form-1">

                <?php if (!empty($message)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $message ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

                <h3>Ingresa</h3>
                <form action="login.php" method="POST"> <!-- Cambiar -->
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Correo Electronico" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login"/>
                    </div>
                </form>
            </div>
        </div>

	<!-- BOOTSTRAP JS -->
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
