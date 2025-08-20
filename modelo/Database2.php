<?php
    require_once 'config2.php';

    class Database {

        public $conn;

        public function __construct()
        {
            $this->conn = new mysqli(DB_SERVE, DB_USERNAME, DB_PASSWORD, DB_NAME);

            if ($this->conn->connect_error) {
                die("Conexion fallida: " . $ $this->conn->connect_error);
            }
        }
    }
?>