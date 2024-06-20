<?php
include_once 'db.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id) && (!empty($data->name) || !empty($data->email))) {
    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";

    $stmt = $db->prepare($query);

    $stmt->bindParam(':id', $data->id);
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':email', $data->email);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "User was updated."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to update user."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to update user. Data is incomplete."));
}
