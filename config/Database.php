<?php 
  class Database {
    // database params
    private $host = 'localhost';
    private $db_name = 'jkf13_ci527_test2';
    private $username = 'jkf13_jon5';
    private $password = 'Arsenal4**';
    private $conn;

    // databse connection
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }