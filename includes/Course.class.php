<?php
    

class Course{ 
    
    //database connection variables
    private $database;
    private $connection;

    public function __construct(){
        $database = new Database();
        $this->connection = $database->getConnection();
    }


    //variables for an instance of Course
    public $id;
    public $coursecode = "";
    public $coursename = "";
    public $progression = "";
    public $courseinfo = "";

    //Get all courses
    public function getCourses(){
        $sql = "SELECT * FROM courses"; 
        $result = $this->connection->query($sql);  
        
        if($result->num_rows > 0){
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {            
            echo "<p> Finns inga poster ännu!</p>";            
            return array();
        }
    }

    //Add a course to database
    public function addCourse(){
        
    }

    //delete a course from database
    public function deleteCourse($id){
        
    }

    //update a course in database
    public function updateCourse($id){
        
    }


}

?>