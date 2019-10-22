<?php
//headers for the api
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, DELETE,PUT");

//includes
include 'includes/Database.class.php';
include 'includes/Course.class.php';

//variables
$course = new Course();
$method = $_SERVER['REQUEST_METHOD'];

switch ($method){
    case "GET":
        $response = $course->getCourses();
        break;

    case "PUT":
    break;

    case "POST":
    break;

    case "DELETE":
    break;
}

echo json_encode($response);

?>