<?php 
  class People {
    // DB stuff
    private $conn;
    private $table = 'people';

    // people table properties
    public $id;
    public $firstname;
    public $lastname;
    public $phone;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' WHERE  id= '. $this->id;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT p.id, p.firstname, p.lastname, p.phone, 
                                    FROM ' . $this->table . 
                                    ' WHERE
                                      p.id = ?
                                    LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // set the properties
          $this->firstname = $row['firstname'];
          $this->lastname = $row['lastname'];
          $this->phone = $row['phone'];
    }

    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET firstname = :firstname, lastname = :lastname, phone = :phone, ';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // clean the data 
          $this->firstname = htmlspecialchars(strip_tags($this->firstname));
          $this->lastname = htmlspecialchars(strip_tags($this->lastname));
          $this->phone = htmlspecialchars(strip_tags($this->phone));

          // bind the data
          $stmt->bindParam(':firstname', $this->firstname);
          $stmt->bindParam(':lastname', $this->lastname);
          $stmt->bindParam(':phone', $this->phone);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    

    // Delete Post
    
    
  }