<?php
$servidor = "Localhost";
$Usuario = "root";
$Password = "";
$BD = "dlyp07";
$conecta = mysqli_connect($servidor,$Usuario,$Password,$BD);
if($conecta->connect_error){
    die("Error al conectar la base de datos de la pagina".$conecta->connect_error);
}
?>