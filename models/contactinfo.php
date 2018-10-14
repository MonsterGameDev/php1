<?php
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
        echo "In Constructor";

        $this->conn = $db;

        echo "End constructor";
    }

    //Get list of contacts
    public function read() {
        echo "in read";
        //create query
        $query = 'SELECT firstname, lastname, jobtitle, email, phone, street, city, country FROM contactinfo ORDER BY lastname ASC';
echo "1";

//prepare statement
        $stmt = $this->conn->prepare($query);
echo "2";
        //Execute query
        $stmt->execute();
echo "3";
        return $stmt;
    }

}