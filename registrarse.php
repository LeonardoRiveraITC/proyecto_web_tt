<?
session_start();

if ($_POST['captcha'] != $_SESSION['captcha']) {
    header("Location: registro.php?e=1");
}

include "class/classBD.php";
//$conexion=mysqli_connect("localhost", "userTEST", '123','test');

$cadena = "ABCDEFGHJKLMNPQRSTUVWXYZ2345678923456789";
$numeC = strlen($cadena);
$nuevPWD = "";
for ($i = 0; $i < 8; $i++)
    $nuevPWD .= $cadena[rand() % $numeC];

$cad = "insert into usuario set Nombre='" . $_POST['nombre'] . "', Apellidos='" . $_POST['apellido'] . "', Correo='" . $_POST['email'] . "', Telefono='" . $_POST['telefono'] . "', idGenero='" . $_POST['genero'] . "', idCataTendencia='" . $_POST['Tendencia'] . "', fechaUltAcceso='" . date("Y-m-d H:i:s") . "', Pwd=password('" . $nuevPWD . "')";

include("tools/class.phpmailer.php");
include("tools/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "smtp.gmail.com"; //mail.google
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Port = 465;     // set the SMTP port for the GMAIL server
$mail->SMTPDebug  = 1;  // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true;   //enable SMTP authentication

$mail->Username =   "20031030@itcelaya.edu.mx"; // SMTP account username

$mail->Password = "";  // SMTP account password

$mail->From = "";
$mail->FromName = "";
$mail->Subject = "Registro completo";
$mail->MsgHTML("<h1>BIENVENIDO " . $_POST['nombre'] . " " . $_POST['apellido'] . "</h1><h2> tu clave de acceso es : " . $nuevPWD . "</h2>");
$mail->AddAddress($_POST['email']);
//$mail->AddAddress("admin@admin.com");
if (!$mail->Send())
    echo  "Error: " . $mail->ErrorInfo;
else {
    $objeBD->consulta($cad);
    header("location: index.php?e=7");
}
/*

PROBLEMAS A SOLUCIONAR EN EL REGISTRO
1) DETECTAR QUE EL CORREO YA ESTA REGISTRADO, 
   YA QUE ES LA LLAVE PRIMARIA Y NO SE DEBE ENVIAR
   EL CORREO SI YA ESTABA REGISTRADO.
2) LA CLAVE DEBE DE CIFRARSE, POR QUE EN EL 
   LOGUEO SE CIFRA.


*/
