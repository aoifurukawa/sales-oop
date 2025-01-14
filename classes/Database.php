<?php

class Database {
    private $server_name = "localhost";

    private $usernmae = "root";
    private $password = "";
    private $db_name = "sales_oop";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server_name, $this->usernmae, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die("Uneble to connect to the database" . $this->conn->connect_error);
        }
    }
}

?>