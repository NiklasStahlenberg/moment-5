<?php
    

class Course{ 
    
    //database connection variables    
    private $connection;

    public function __construct($connection){      
        $this->connection = $connection;
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
    public function addCourse($coursecode, $coursename, $progression, $courseinfo){
        
        $sql = "INSERT INTO courses (coursecode, coursename, progression, courseinfo) 
                VALUES('$coursecode', '$coursename', '$progression', '$courseinfo')";
        $result = $this->connection->query($sql);

        if($result){
            $response = array('message' => 'Course Added!');  
            return $response; 
        }else{
            $response = array('message' => 'error adding course');
            return $response;
        }
    }

    //delete a course from database
    public function deleteCourse($id){
        $sql = "DELETE FROM courses WHERE id=$id";
        $result = $this->connection->query($sql);

        if($result){
             $response = array('message' => 'Course Deleted');
             return $response;
        }else{
            $response = array('message' => 'Failed to delete course');
            return $response;
        }
    }

    //update a course in database
    public function updateCourse($id, $coursecode, $coursename, $progression, $courseinfo){
        $sql = "UPDATE courses 
        SET coursecode='$coursecode', coursename='$coursename', progression='$progression', courseinfo='$courseinfo'
        WHERE id=$id";
        $result = $this->connection->query($sql);

        if($result){
            $response = array('message' => 'Course Updated!');
            return $response;
        }else{
            $response = array('message' => 'Falied to update course');
            return $response;
        }
    }


}

?>