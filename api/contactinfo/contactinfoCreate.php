<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './../../config/Database.php';
include_once './../../models/contactinfo.php';

 $data = file_get_contents('php://input');

 $data = json_decode($data);

$firstname = $data->firstname;
$lastname = $data->lastname;
$jobtitle = $data->jobtitle;
$email = $data->email;
$phone = $data->phone;
$street = $data->street;
$city = $data->city;
$country = $data->country;



try {
    $database = new Database();
    $db = $database->connect();
        //Instantiate Contactinfo - object
        $ci = new ContactInfo($db);
    
        // Reading content
        $result = $ci->create($data);
        echo "Result: " . $result;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

