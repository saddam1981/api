<?php 
    require_once('../includes/Client.class.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'PUT') {
        if(isset($_GET['id']) && isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['email']) && isset($_GET['cuit'])){
            $id = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $email = $_GET['email'];
            $cuit = $_GET['cuit'];
            Cliente::update_cliente($id, $nombre, $apellido, $email, $cuit);
        }
    }

?>

