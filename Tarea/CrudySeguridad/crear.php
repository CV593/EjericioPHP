<?php 
//esto no lo pedia pero como reutilice el ejercicio anterior pos toco agregarlo xD
    include('cone.php'); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['Usuario'];
        $password = $_POST['Pass'];
        $tipo = $_POST['Tipo'];
        if (!empty($username) && !empty($password) && !empty($tipo)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("INSERT INTO login (Usuario, Pass, Tipo) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $hashed_password, $tipo);
            if ($stmt->execute()) {
                echo "Usuario creado exitosamente. Será redirigido al login en 5 segundos.";
                header("refresh:5;url=login.php");
                exit();
            } else {
                die("Query failed: " . $stmt->error);
            }
            $stmt->close();
        } else {
            echo "Por favor, complete todos los campos";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Crear Usuario</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="Usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="Usuario" name="Usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="Pass" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="Pass" name="Pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="Tipo" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="Tipo" name="Tipo" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>