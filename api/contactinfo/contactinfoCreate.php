<?php
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
    ', $firstname, $lastnane, $jobtitle, $email, $phone, $street, $city, $country);
