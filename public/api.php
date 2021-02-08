<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../app/config.php";
require_once '../app/db.php';
require_once '../app/router.php';
require_once '../app/views/View.php';
require_once '../app/controllers/Controller.php';
require_once '../app/models/Model.php';

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->controller) && !empty($data->number1) && !empty($data->number2) && !empty($data->operation)) {
  $result = Router::get_url_and_parse_api($data);
  if($result !== false) {
    http_response_code(201);
    echo json_encode(array("result" => $result, "operation" => $data->operation, "number1" => $data->number1, "number2" => $data->number2));
  } else {
    http_response_code(503);
    echo json_encode(array("message" => "Unable to calculate the result."));
  }
} else {
  http_response_code(400);
  echo json_encode(array("message" => "Data is incomplete."));
}

?>
