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

echo printf('Firstname: %s<br>
    lastname: %s<br>
    jobtitle: %s<br>
    email: %s<br>
    phone: %s<br>
    street: %s<br>
    city: %s<br>
    country: %s<br>
    ', $firstname, $lastname, $jobtitle, $email, $phone, $street, $city, $country);


    try {
        $database = new Database();
        $db = $database->connect();
         //Instantiate Contactinfo - object
         $ci = new ContactInfo($db);
     
         // Reading content
         $result = $ci->create($data);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }