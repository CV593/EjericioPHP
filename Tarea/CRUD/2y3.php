<h1>EJEMPLO DE CONEXION A BASE DE DATOS</h1>
<form action="" method="post">
    <label for="pro">INGRESE EL PRODUCTO</label>
    <input type="text" name="pro" id="pro" placeholder="Nombre del producto">
    <br><br>
    <label for="pre">INGRESE EL PRECIO</label>
    <input type="text" name="pre" id="pre" placeholder="Precio del producto">
    <br>
    <input type="submit" value="Guardar">
</form>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Ejercicio";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }
    if ($_POST) {
        $pro = $_POST['pro'];
        $pre = $_POST['pre'];
        $consulta = "INSERT INTO Productos(Nombre, Precio) VALUES ('".$pro."','".$pre."')";
        if ($conn->query($consulta) === TRUE) {
            echo "Producto guardado";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
?>
<?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    class Productos {
        public $id;
        public $nombre;
        public $precio;
    }
    $consulta = "SELECT * FROM Productos";
    $resultado = $conn->query($consulta);
    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            $producto = new Productos();
            $producto->id = $row['Id'];
            $producto->nombre = $row['Nombre'];
            $producto->precio = $row['Precio'];
            echo "<tr><td>".$producto->id."</td><td>".$producto->nombre."</td><td>".$producto->precio."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay productos";
    }
    $conn->close();
?>