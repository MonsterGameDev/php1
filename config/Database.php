<?php
    class Database {
        //DBParams
        private $host;
        private $db_name;
        private $username;
        private $password;
        private $conn;

        public function connect() {
            $this->conn = null;

            foreach ($_SERVER as $key => $value) {
                if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
                    continue;
                }
                
                $this->host = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
                $this->dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
                $this->username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
                $this->password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);

                echo "HELLO";
            };

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, 
                $this->username, $this->password);
                
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             } catch (PDOException $e) {
                 echo 'Connection Error: ' . $e.getMessage();
             }

             return $this->conn;


        }
        
    }