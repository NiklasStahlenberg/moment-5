<?php

class Database{
    //specify database variables
    private $host = "localhost";
    private $db_name = "course_database";
    private $username = "course_database";
    private $password = "password";
    public $connection;  

    //get database connection
    public function getConnection(){
        $this->connection = null;

        $this->connection = new mysqli($this->host, $this->username, $this->password , $this->db_name);
        if($this->connection->connect_errno > 0){
            die("Fel vid anslutning: " . $this->connection->connect_error);
        } 
        return $this->connection;
    }

}

?>