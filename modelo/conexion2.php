<?php

    class conexion{
 
        private $hostname = "localhost";
        private $databse = "aulaguard";
        private $username = "root";
        private $password = "";
        private $charset = "utf8mb4";

        function conectar(){
                try{
                $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->databse . "; charset=" . $this->charset;

                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
                $pdo = new PDO($conexion, $this->username, $this->password ,$options);

                return $pdo;
            }catch(PDOException $e){
                echo"Error en la conexion: ".$e->getMessage();
                exit;
            }
        }
    }