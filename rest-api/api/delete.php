<?php
include_once 'db.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $query = "DELETE FROM users WHERE id = :id";

    $stmt = $db->prepare($query);

    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        http_response_code(200);
        echo json_encode(array("message" => "User was deleted."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to delete user."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to delete user. Data is incomplete."));
}
