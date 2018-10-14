<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once './../../config/Database.php';
    include_once './../../models/contactinfo.php';

    //Instantiate and connect
   echo "Hello Read is here";

   $database = new Database();
   $db = $database->connect();
    //Instantiate Contactinfo - object
    $ci = new ContactInfo($db);

    //Reading content
    $result = $ci.read();
    //Get rowcount
    $num = $result->rowCount();

    echo $num;