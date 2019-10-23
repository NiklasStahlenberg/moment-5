<?php
//headers for the api
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, DELETE,PUT");

//includes
include 'includes/Database.class.php';
include 'includes/Course.class.php';
$database = new Database;
$connection = $database->getConnection();

//variables
$response;
$course = new Course($connection);
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true); 

switch ($method){
    //what happens on GET
    case "GET":
        $response = $course->getCourses();
        break;

    //update course    
    case "PUT":
        if( !empty($input['coursecode']) && 
            !empty($input['coursename']) &&
            !empty($input['progression']) &&
            !empty($input['courseinfo']) &&
            !empty($input['id'])) {
                //http response
                http_response_code(201);
                //add to database
                $response = $course->updateCourse($input['id'], $input['coursecode'], $input['coursename'], $input['progression'], $input['courseinfo']);
            } else {
                //http response
                http_response_code(503);
                $response = array("message" => "Error updating course");
            }
    break;

    //what happens on POST
    case "POST":
        //checks so the string are not empty
        if( !empty($input['coursecode']) && 
            !empty($input['coursename']) &&
            !empty($input['progression']) &&
            !empty($input['courseinfo'])) {
                //http response
                http_response_code(201);
                //add to database
                $response = $course->addCourse($input['coursecode'], $input['coursename'], $input['progression'], $input['courseinfo']);
            } else {
                //http response
                http_response_code(503);
                $response = array("message" => "Error creating course");
            }
    break;

    case "DELETE":
        $response = $course->deleteCourse($input['id']);        
    break;
}

echo json_encode($response);

?>