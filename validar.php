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

session_start();
//paso 1 Abrir la conexion
//Variables de conexion

/*
if($conexion){
    //paso 2 hacer una consulta de sql
    $bloqueRegistros=mysqli_query($conexion,"Select * from usuario");

}else{
    echo "No se pudo conectar";
}
*/
include "class/classBD.php";

if(isset($_GET['email']) && isset($_GET['password'])){
    if($_GET['email']>'' && $_GET['password']>''){
        /*$query="Select * from usuario where Correo='".$_GET['email']."' and pwd='".$_GET['pwd']."'";
        $query=str_replace($query,"'",""); //Tambien se puede hacer uso de una expresion regular.*/

        $query="Select * from usuario where Correo='".$_GET['email']."' and Pwd=password('".$_GET['password']."')";

        $registro=$objeBD->getTupla($query);

        //ya no se necesitan porque con las contraseñas encriptadas funcionan.
        //$registro=$objeBD->getTupla();

        //$registro->pwd==$_GET['pwd']

        if($objeBD->bloqueRegistros){
            $_SESSION['nombre']=$registro->Nombre." ".$registro->Apellidos;
            $_SESSION['correo']=$registro->Correo;
            $_SESSION['idRol']=$registro->idRol;
            $_SESSION['id']=$registro->id;
            if($registro->idRol==2){
                header("location: admin/home.php");
            }else{
                $objeBD->consulta("update usuario set fechaUltAcceso='".date("Y-m-d H:i:s")."', numeAccesos=numeAccesos+1 where id=".$registro->id);
                header("location: users/home.php");
            } 
        }else{
            header("location: login.php?e=3");
        }
    }else{
        header("location: login.php?e=1");  //  no hay ninguna info en los correos 
    }
}else{
    header("location: login.php?e=2");  //  no jala nada de la BD
}
?>