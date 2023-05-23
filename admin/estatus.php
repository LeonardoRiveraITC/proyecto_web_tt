
<?php
include "menu.php";
?>
<div class="container" id="areaTrabajo">
    <br>
    <?php
    include "../class/classEstatus.php";
    echo "<br>";
    echo $objeEstatus->list();

    ?>
</div>
<script src="../controllers/estatus.js?1.04"></script>
</body>
</html>