<?php
	function abrirConexion() {
		$usuario = "root";
		$contrasena = "";
		$servidor = "localhost";
		$basededatos = "modelosin";

		$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de BD");
		$db = mysqli_select_db($conexion, $basededatos) or die ( "No se ha encontrado la base de datos" );

		return $conexion;
	}

	function queries($conexion, $consulta) {
		$resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
		return $resultado;
	}

	function transaction($conexion, $consulta) {
		if (mysqli_query($conexion, $consulta)) {
		    return true;
		} else {
		    return false;
		}
	}

	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}
?>