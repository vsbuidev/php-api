<?php
require 'database.php';

class SoapApi
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getItem($id)
    {
        $query = "SELECT name, description FROM items WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ['name' => $row['name'], 'description' => $row['description']];
    }

    public function createItem($name, $description)
    {
        $query = "INSERT INTO items (name, description) VALUES (:name, :description)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            return "Item created successfully.";
        } else {
            return "Error creating item.";
        }
    }

    public function updateItem($id, $name, $description)
    {
        $query = "UPDATE items SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            return "Item updated successfully.";
        } else {
            return "Error updating item.";
        }
    }

    public function deleteItem($id)
    {
        $query = "DELETE FROM items WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return "Item deleted successfully.";
        } else {
            return "Error deleting item.";
        }
    }
}

$options = ['uri' => 'http://crud-api.test/soap-api'];
$server = new SoapServer('http://crud-api.test/soap-api/api.wsdl', $options);
$server->setClass('SoapApi');
$server->handle();
