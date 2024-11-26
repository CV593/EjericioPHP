<h1>EJEMPLO DE COEXION A BASE DE DATOS</h1>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ejercicio";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
    }else{
        echo "Conexion exitosa";
        $conn->close();
    }
?>