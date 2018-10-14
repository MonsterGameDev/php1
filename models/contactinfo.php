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

    public function create($data) {
                
        $firstname = $data->firstname;
        $lastname = $data->lastname;
        $jobtitle = $data->jobtitle;
        $email = $data->email;
        $phone = $data->phone;
        $street = $data->street;
        $city = $data->city;
        $country = $data->country;

      
        $sql = sprintf("INSERT INTO  contactinfo (firstname, lastname, jobtitle, email, phone, street, city, country) 
                VALUES ('%s',' %s', '%s', '%s', '%s', '%s', '%s', '%s')",
                $firstname, $lastname, $jobtitle, $email, $phone, $street, $city, $country);
        //prepare statement
        $stmt = $this->conn->prepare($sql);
        
        //Execute query
        if($stmt->execute()) {
            return printf("Bruger: %s %s oprettet succesfuldt", $firstname, $lastname);
        } else {

            return printf("Der opstod en fejl - bruger: %s %s kunne ikke oprettes", $firstname, $lastname);
        }
        
        
    }


   

}