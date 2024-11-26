<?php
//como se que solo revisas el codigo entonces lo que hice fue que el usuario tenga una pequeña validacion
//para que no pueda hacer cosas que no deberia hacer, como por ejemplo agregar tareas, editarlas o eliminarlas
//si no es admin ,solo leer la tabla , tambien agregue un token para evitar ataques csrf
//y tambien agregue un boton para cerrar sesion
//tecnicamente hize los ultimos ejercicios aca en una carpeta solita
include('cone.php'); 
include('validacion.php');
$message = '';
$tipo_usuario = '';
$csrf_token = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
if (isset($_SESSION['Usuario'])) {
    $stmt = $conexion->prepare("SELECT Tipo FROM login WHERE Usuario = ?");
    $stmt->bind_param("s", $_SESSION['Usuario']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tipo_usuario = $row['Tipo'];
    }
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //esto del token tuve que buscarlo en internet, no sabia como hacerlo pero alli ayudo stackoverflow xD
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error: CSRF token inválido.");
    }
    //creo que esto no lo pedia el ejercicio pero lo puse por si acaso
    if ($tipo_usuario !== 'admin') {
        $message = 'No tiene permisos para realizar esta acción.';
    } else {
        function sanitize($data) {
            return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
        }
        if (isset($_POST['add'])) {
            $titulo = sanitize($_POST['Titulo']);
            $descripcion = sanitize($_POST['Descripcion']);
            $estado = sanitize($_POST['Estado']);
            $stmt = $conexion->prepare("INSERT INTO tareas (Titulo, Descripcion, Estado) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $titulo, $descripcion, $estado);
            $message = $stmt->execute() ? 'Tarea agregada correctamente.' : 'Error al agregar la tarea.';
            $stmt->close();
        } elseif (isset($_POST['update'])) {
            $id = intval($_POST['id']);
            $titulo = sanitize($_POST['Titulo']);
            $descripcion = sanitize($_POST['Descripcion']);
            $estado = sanitize($_POST['Estado']);
            $stmt = $conexion->prepare("UPDATE tareas SET Titulo = ?, Descripcion = ?, Estado = ? WHERE Id = ?");
            $stmt->bind_param("sssi", $titulo, $descripcion, $estado, $id);
            $message = $stmt->execute() ? 'Registro actualizado correctamente.' : 'Error al actualizar el registro.';
            $stmt->close();
        } elseif (isset($_POST['delete'])) {
            $id = intval($_POST['id']);
            $stmt = $conexion->prepare("DELETE FROM tareas WHERE Id = ?");
            $stmt->bind_param("i", $id);
            $message = $stmt->execute() ? 'Registro eliminado correctamente.' : 'Error al eliminar el registro.';
            $stmt->close();
        }
    }
}
$query = "SELECT * FROM tareas";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Lista de Tareas</h1><br>
    <div class="text-end">
        <form action="logout.php" method="POST">
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
    <?php if ($message): ?>
        <div class="alert alert-info text-center"><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if ($tipo_usuario === 'admin'): ?>
        <div class="mb-4">
            <h2>Agregar Tarea</h2>
            <form action="index.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                <div class="mb-3">
                    <label for="Titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                </div>
                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                </div>
                <div class="mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="Estado" name="Estado" required>
                </div>
                <button type="submit" name="add" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    <?php endif; ?>
    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo htmlspecialchars($row['Titulo']); ?></td>
                        <td><?php echo htmlspecialchars($row['Descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($row['Estado']); ?></td>
                        <td>
                            <?php if ($tipo_usuario === 'admin'): ?>
                                <form action="index.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                                    <input type="text" class="form-control mb-2" name="Titulo" value="<?php echo htmlspecialchars($row['Titulo']); ?>">
                                    <input type="text" class="form-control mb-2" name="Descripcion" value="<?php echo htmlspecialchars($row['Descripcion']); ?>">
                                    <input type="text" class="form-control mb-2" name="Estado" value="<?php echo htmlspecialchars($row['Estado']); ?>">
                                    <button type="submit" name="update" class="btn btn-warning btn-sm">Editar</button>
                                </form>
                                <form action="index.php" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['Id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning text-center">No hay tareas registradas.</div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
