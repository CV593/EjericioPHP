<?php
    function conPalabras($cadena){
        $palabras = explode(" ", $cadena);
        $resultado = 0;
        for ($i=0; $i < count($palabras); $i++) { 
            $resultado++;
        }
        return $resultado;
    }
?>

<form action="" method="get">
    <h1>CONTAR PALABRAS EN UNA CADENA</h1><br>
    <label for="cadena">Ingrese la cadena:</label>
    <input type="text" name="cadena" id="cadena">
    <input type="submit" value="Enviar">
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $c= filter_input(INPUT_GET, 'cadena',);
            echo "<br>La cadena ingresada es: ".$c."<br>";
            echo "La cantidad de palabras es: ".conPalabras($c);
        }
    ?>
</form>