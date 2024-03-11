<?php 
    require_once('../includes/Client.class.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $cuit = $_GET['cuit'];
        if(isset($nombre) && isset($apellido) && isset($email) && isset($cuit)){
            Cliente::crear_cliente($nombre, $apellido, $email, $cuit);
        }
    }
?>

