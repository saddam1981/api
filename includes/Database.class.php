<?php
    class Database{
        private $host = 'localhost:3306';
        private $user = 'root';
        private $password = '92819281';
        private $database = 'Sasa';

        public function getConnection(){
            $hostDB = "mysql:host=".$this->host.";dbname=".$this->database.";";

            try{
                $connection = new PDO($hostDB, $this->user,$this->password);
                $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $connection;

            }catch (PDOException $e){

                die("ERROR: ".$e->getMessage());

            }
        }

    }
    /*
    $db = new Database();
    if($db->getConnection()){
        echo "Connected";
    }else{
        echo "Not connected";
    }*/
?>

