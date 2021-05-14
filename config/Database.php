<?php 
  class Database {
    // database parameters
    private $host = 'localhost';
    private $db_name = 'jkf13_ci527_test2';
    private $username = 'jkf13_jon5';
    private $password = 'Arsenal4**';
    private $conn;

    // connect the database 
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      } catch(PDOException $e) {
        //show error 
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }

  