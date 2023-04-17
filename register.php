<?php
session_start();
$captcha = "Cuanto es: ";
$var1 = rand() % 9 + 1;
$var2 = rand() % 9 + 1;
$ope = rand() % 3;

switch ($ope) {
    case 0:
        $captcha .= $var1 . " + " . $var2;
        $resu = $var1 + $var2;
        break;

    case 1:
        $captcha .= $var1 . " - " . $var2;
        $resu = $var1 - $var2;
        break;

    case 2:
        $captcha .= $var1 . " * " . $var2;
        $resu = $var1 * $var2;
}

$_SESSION['captcha'] = $resu;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <link href="index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
    <?php
    include "menu.php"
    ?>

    <!--FORM-->
    <div class="container" >
        <div class="row">
            <div class="col-12">
                <form class="mb-3 mt-3 w-50 mx-auto" action="registrarse.php" method="post">
                    <label for="nameInput" class="form-label">Nombre</label>
                    <input name="nombre" type="text" class="form-control" id="nameRegister" placeholder="Ingrese su nombre">
                    <label for="apellidoInput" class="form-label mt-3">Apellidos</label>
                    <input name="apellido" type="text" class="form-control" id="apRegister" placeholder="Ingrese sus apellidos">
                    <label for="userInput" class="form-label mt-3">Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="userRegister" placeholder="Ingrese su usuario">
            
                    <label for="emailInput" class="form-label">Correo electrónico</label>
                    <input name="email" type="email" class="form-control" id="emailRegister" placeholder="Ingrese su correo electrónico">
                    <label for="emailInput" class="form-label">Genero</label>
                    <select name="genero" class="form-control">
                        <option value="1">Femenino</option>
                        <option value="2">Masculino</option>
                    </select>
                    <label for="preferenciaSexual" class="form-label">Preferencia Sexual</label>
                    <?php
                    include "class/classBD.php";
                    echo $objeBD->crearLista("select * from catatendencia order by Nombre;", "Tendencia", "idTendencia", "Nombre");
                    ?>
                    <label for="telefonoInput" class="form-label">Teléfono</label>
                    <input name="telefono" type="tel" class="form-control" id="telefonoRegister" placeholder="Ingrese su número telefónico">

                    <label for="captchaInput" class="form-label">Captcha</label>
                    <input name="captcha" type="text" class="form-control" placeholder="<?= $captcha; ?>" required>
                
                    <input type="submit" class="btn btn-dark mx-auto mt-3 w-25" value="Registrar, perra!!!">
                </form>
            </div>
        </div>
    </div>
    <!--/FORM-->
</body>

</html>