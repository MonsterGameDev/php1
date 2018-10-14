<?php
 $data = file_get_content('php://input');
 echo "Data: " . $data;

class ContactInfo {
    //DBStuff
    private $conn;
    private $table = 'contactinfo';

    //contact info properties
    public $id;
    public $firstname;
    public $lastname;
    public $jobtitle;
    public $email;
    public $phone;
    public $street;
    public $city;
    public $country;

    public function __construct($db) {
        $this->conn = $db;

    }

    //Get list of contacts
    public function read() {
        //create query
        $query = 'SELECT firstname, lastname, jobtitle, email, phone, street, city, country FROM contactinfo ORDER BY lastname ASC';

//prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }


    public function create() {
        $data = file_get_content('php://input');
        echo "Data: " . $data
        //return $data
    }

}