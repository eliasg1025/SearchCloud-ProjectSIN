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
                <h3>Ingresa</h3>
                <form action="main.php" method=""> <!-- Cambiar -->
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Correo Electronico" value="" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Contraseña" value="" required>
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
