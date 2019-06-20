<?php

// Retorna una objeto PDO

function abrirConexion() {

    // remote

    
    $server = "b1gtrg162sfxnptw1ej0-mysql.services.clever-cloud.com";
    $username = "ua3vfykjoh8vdshz";
    $password = "jPz18bzSnP2YAeEXTS8f";
    $database = "b1gtrg162sfxnptw1ej0"; 

    // local

    /*
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "modelosin"; */

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

?>
