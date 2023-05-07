<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <title>Estatus</title>
</head>

<body>
    <?php
    include "menu.php";
    ?>
    <div class="container">
        <br>
        <?php
        include "../class/classEstatus.php";

        if (isset($_POST['accion']) && isset($_POST['id'])) {
            echo $objeEstatus->ejecuta($_POST['accion'], $_POST['id']);
        } else {
            if (isset($_POST['accion'])) {
                echo $objeEstatus->ejecuta($_POST['accion']);
            } else
                echo $objeEstatus->list();
        }
        ?>
    </div>
</body>

</html>