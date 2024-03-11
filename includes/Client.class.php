<?php
    require_once('Database.class.php');

    class Cliente{
        public static function crear_cliente ($nombre, $apellido, $email, $cuit){
            $db = new Database();
            $conn = $db->getConnection();
            $query = $conn->prepare("INSERT INTO clientes (nombre, apellido, email, cuit) VALUES (:nombre, :apellido, :email, :cuit)");
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':apellido', $apellido);
            $query->bindParam(':email', $email);
            $query->bindParam(':cuit', $cuit);

            if($query->execute()){
                header('HTTP/1.1 201 Cliente Creado Correctamente');
            }else{
                header('HTTP/1.1 404 Cliente No Creado');
            }
        }
    }
?>