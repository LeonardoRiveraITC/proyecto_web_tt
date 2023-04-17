<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <?php
    include "menu.php"
    ?>

    <div class="d-flex justify-content-center align-items-center">
        <img id="itc_logo" src="itc_logo.png">
    </div>

    <!--FORM-->
    <div class="container">
        <div class="row">
            <form class="mb-3 mt-3 w-25 mx-auto" action="validar.php" method="get">
                <label for="userInput" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usrLogin" placeholder="Ingrese su usuario">
                <label for="passInput" class="form-label mt-3">Contraseña</label>
                <input type="text" class="form-control" id="passLogin" placeholder="Ingrese su contraseña">

            </form>
            <div class="d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-dark mx-auto mt-3 w-25">Iniciar sesión</button>
            </div>
        </div>
    </div>
    <!--/FORM-->

    <div class="container">
        <p class="Lorem ipsum">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate ultrices malesuada. Etiam quis
            lacus a elit bibendum ullamcorper at a nisl. Vestibulum eu urna vitae velit congue bibendum id id dui. Sed
            varius, nibh eget bibendum facilisis, sem lorem luctus felis, sed pharetra est enim in diam. Sed ultrices,
            mauris sit amet semper malesuada, arcu nisl imperdiet tortor, vel ullamcorper velit arcu vel mi. Ut ac nibh
            nulla. Suspendisse eget bibendum nulla, at pretium nisl. Integer elementum sodales feugiat. Donec ac risus
            mi. Proin efficitur libero vel convallis suscipit.
        </p>
    </div>

    <div class="container">
        <p class="Lorem ipsum">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vulputate ultrices malesuada. Etiam quis
            lacus a elit bibendum ullamcorper at a nisl. Vestibulum eu urna vitae velit congue bibendum id id dui. Sed
            varius, nibh eget bibendum facilisis, sem lorem luctus felis, sed pharetra est enim in diam. Sed ultrices,
            mauris sit amet semper malesuada, arcu nisl imperdiet tortor, vel ullamcorper velit arcu vel mi. Ut ac nibh
            nulla. Suspendisse eget bibendum nulla, at pretium nisl. Integer elementum sodales feugiat. Donec ac risus
            mi. Proin efficitur libero vel convallis suscipit.
        </p>
    </div>

    <!--FOOTER-->
    <div class="container-fluid" id="footer">
        <footer class="d-flex fixed-bottom flex-wrap justify-content-between align-items-center py-3  border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2023 TecNM en Celaya</p>

            <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Inicio</a></li>
                <li class="nav-item"><a href="login.html" class="nav-link px-2 text-muted">Login</a></li>
                <li class="nav-item"><a href="register.html" class="nav-link px-2 text-muted">Registrarse</a></li>
                <li class="nav-item"><a href="about_us.html" class="nav-link px-2 text-muted">About Us</a></li>
            </ul>
        </footer>
    </div>
    <!--/FOOTER-->
</body>
</html>