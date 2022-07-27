<?php
class Conn {
    public $server = "localhost";
    public $username = "root";
    // public $password = "L!nuxR00t@)!%";
    public $password = "";
    public $database = "rm_sales";
    public $conn = NULL;
    
    function __construct() {
        $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database", $this->username, $this->password);
    }
    
    function getResults($sql){
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    
    function close(){
        $this->conn = NULL;
    }
}
