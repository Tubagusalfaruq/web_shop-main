<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: GET");
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../config/database.php";
include_once "../../data/product.php";

$request = $_SERVER['REQUEST_METHOD'];

$db = new Database();
$conn = $db->connection();

$product = new Product($conn);

$stmt = $product->fetch();
$count = $stmt->rowCount();

$response = [];

if ($request == "GET") {
    if ($count > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data[] = array("id" => $id, "image" => $image, "name" => $name, "description" => $description,);
        }
        $response = array("status" => array("message" => "Success", "code" => http_response_code(200)), "data" => $data);
    } else {
        http_response_code(404);
        $response = array("status" => array("message" => "Data Not Found", "code" => http_response_code()));
    }
} else {
    http_response_code(405);
    $response = array("status" => array("message" => "Method Not Allowed", "code" => http_response_code()));
}

echo json_encode($response);
