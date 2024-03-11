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

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $cuit = $_GET['cuit'];
        if(isset($nombre) && isset($apellido) && isset($email) && isset($cuit)){
            Cliente::crear_cliente($nombre, $apellido, $email, $cuit);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        Cliente::obtener_clientes();
    }

    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $id = $_GET['id'];
        if(isset($id)){
            Cliente::borrar_cliente($id);
        }
    }

?>
