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
</body>

</html>