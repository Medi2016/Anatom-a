<?php
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "prueba";

// Create connection
$conexion = new mysqli($servername, $username, $password, $dbname);
$conexion->set_charset('utf8');
//$mysqli_set_charset($conexion,"utf8");
// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
} 

?>