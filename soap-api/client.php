<?php
$client = new SoapClient('http://crud-api.test/soap-api/api.wsdl');

// Create item
$response = $client->createItem('Test Item', 'This is a test item.');
echo $response . PHP_EOL;

// Get item
$response = $client->getItem(1);
echo 'Name: ' . $response['name'] . ', Description: ' . $response['description'] . PHP_EOL;

// Update item
$response = $client->updateItem(1, 'Updated Item', 'This is an updated test item.');
echo $response . PHP_EOL;

// Delete item
$response = $client->deleteItem(1);
echo $response . PHP_EOL;
