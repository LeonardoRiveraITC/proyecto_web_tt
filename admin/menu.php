<?
session_start();

if (!isset($_SESSION['nombre'])) {
    header("location: ../index.php?e=45");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css?1.10">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    <title>Ttinder</title>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-confirm.js"></script>
    <link rel="stylesheet" href="../css/jquery-confirm.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Mitinder</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuario.php">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tendencias.php">Tendencias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="generos.php">Generos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="roles.php">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gustos.php">Gustos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="estatus.php">Estatus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="zodiaco.php">Zodiaco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-danger btn-sm" href="../index.php">Cerrar Sesion</a>
                </li>
            </ul>
            <p class="text-primary">
                <?php
                echo "Bienvenido " . $_SESSION['nombre'];
                ?>
            </p>
        </div>
    </div>
</nav>



