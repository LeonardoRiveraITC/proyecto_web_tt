<?
session_start();

if (!isset($_SESSION['nombre'])) {
    header("location: ../index.php?e=45");
}
?>

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