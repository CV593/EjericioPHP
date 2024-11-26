<?php
    function genContra(){
        //si que paja meter todos los caracteres xD nuc si se puede hacer de otra forma pero bueno
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $contra = "";
        for ($i=0; $i < 8; $i++) { 
            $contra .= $caracteres[rand(0, strlen($caracteres)-1)];
        }
        return $contra;
    }
?>
<form action="" method="get">
    <h1>GENERADOR DE CONTRASEÑAS</h1><br>
    <input type="submit" value="Generar">
    <br>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "<br>La contraseña generada es: ".genContra();
        }
    ?> 
</form>