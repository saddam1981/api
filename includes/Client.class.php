<?php
    require_once('Database.class.php');

    class Cliente{
        /* CREAR CLIENTE */
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
        /* BORRAR CLIENTE */
        public static function borrar_cliente ($id){
            $db = new Database();
            $conn = $db->getConnection();
            $query = $conn->prepare("DELETE FROM clientes WHERE id = :id");
            $query->bindParam(':id', $id);

            if($query->execute()){
                header('HTTP/1.1 200 Cliente Borrado Correctamente');
            }else{
                header('HTTP/1.1 404 Cliente No Borrado');
            }
        }
        /* OBTENER CLIENTES */
        public static function obtener_clientes (){
            $db = new Database();
            $conn = $db->getConnection();
            $query = $conn->prepare("SELECT * FROM clientes");
            if($query->execute()){
                $result = $query->fetchAll();
                echo json_encode($result);
                header('HTTP/1.1 201 OK');
            }else{
                header('HTTP/1.1 404 No se pudieron obtener los clientes');
            }
        }
        /* ACTUALIZAR CLIENTE */
        public static function update_cliente ($id, $nombre, $apellido, $email, $cuit){
            $db = new Database();
            $conn = $db->getConnection();

            if (isset($nombre) && isset($apellido) && isset($email) && isset($cuit)) {
            
            $query = $conn->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, email = :email, cuit = :cuit WHERE id = :id");
            $query->bindParam(':nombre', $nombre);
            $query->bindParam(':apellido', $apellido);
            $query->bindParam(':email', $email);
            $query->bindParam(':cuit', $cuit);
            $query->bindParam(':id', $id);

                if($query->execute()){
                    header('HTTP/1.1 200 Cliente Actualizado Correctamente');
                }else{
                    header('HTTP/1.1 404 Cliente No Actualizado');
                }
            }
        }
    }
?>