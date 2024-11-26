<form action="" method="post">
    <h1>CALCULADORA DE EDAD</h1>
    <label for="fn">Ingrese su Fecha de Nacimiento:</label>
    <input type="date" name="fn" id="fn" required>
    <br><br>
    <input type="submit" value="Enviar">
</form>

<?php
    if ($_POST) {
        $fecha = $_POST['fn']; 
        //aca use las funciones date_diff y date_create para calcular la edad
        //hacerlo a pasito hubiera sido un dolor de cabeza xD
            $edad = date_diff(date_create($fecha), date_create('now'))->y;
            echo "<p>Tu edad actual es de $edad años!</p>";
            if ($edad < 18) {
                echo "<p><br>Eres un bebé</p>";
            } else {
                echo "<p><br>Ya estas viejo</p>";
            }
        } else {
            echo "<p>Por favor, complete el campo.</p>";
    }
?>