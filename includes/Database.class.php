<?php

class Database{
    //specify database variables
    private $host = "studentmysql.miun.se";
    private $db_name = "nist1802";
    private $username = "nist1802";
    private $password = "5l2s0pna";
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