<?php
/*
    4 pasos para procesar con un servidor

    1- Abrir la conexion:

    mysqli_connect(servidor,usuario,claveUsuario,baseDAtos);

    2- Realizar la consulta:

    mysqli_query("conexion","cadena de consulta");

    3- Procesar los registros 
    4- Cerrar la conexion
*/

//  PRIMER PASO
//  Permite establecer la conexion
$conexion = mysqli_connect("localhost","alfito","123","mitinder") or die("No se pudo carnal.");

    //  or die(): o te conectas o te mueres.

if($conexion) {
    //  SEGUNDO PASO
$bloqueRegistro = mysqli_query($conexion,"SELECT * FROM Usuario");

}
        
else 
    echo "No se pudo conectar.";

class baseDatos {
    var $conexion;
    var $bloqueRegistro;

    function conecta() {
        $this->conexion = mysqli_connect("localhost","alfito","123","mitinder") or die("No se pudo carnal.");
    }//close fun

    function cierraBD() {
        mysqli_close($p_sql);
    }//close fun

    function consulta($p_sql) {
        $this->conecta();
        $this -> bloqueRegistro = mysqli_query(this->$conexion,$p_sql);
        $this->cierraBD();
    }//close fun
}//close class

?>