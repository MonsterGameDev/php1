<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../../config/Database.php';
    include_once './../../models/contactinfo.php';

    //Instantiate and connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate Contactinfo - object
    $ci = new ContactInfo($db);

    //Reading content
    $result = $ci.read();
    //Get rowcount
    $num = $result->rowCount();
    
    echo "FOUND " . $num . " records";

    //Check if any records
    if ($num > 0) {
        $returnArr = Array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract( $row);

            $item = Array(
                'id'=> $id,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'jobtitle' => $jobtitle,
                'email' => $email,
                'phone' => $phone,
                'street' => $street,
                'city' => $city,
                'country' => $country 
            );

            array_push($returnArr, $item);
        }
        echo json_encode($returnArr);
    } else {
        echo json_encode (Array('message' => 'No contacts found'));
    }