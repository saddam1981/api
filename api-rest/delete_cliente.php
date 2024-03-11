<?php 
    require_once('../includes/Client.class.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $id = $_GET['id'];
        if(isset($id)){
            Cliente::borrar_cliente($id);
        }
    }

?>

