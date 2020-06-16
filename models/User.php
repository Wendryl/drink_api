<?php 

  class User {
    private $connection;
    private $table = 'users';

    public $id;
    public $email;
    public $name;
    public $password;

    public function __construct($db) {
      $this->connection = $db;
    }

    public function read() {
      $query = 'SELECT * FROM ' . $this->table;
      $stmt = $this->connection->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    public function read_single() {
      $query = 'SELECT 
      id, name, email, 
      drink_counter 
      FROM ' . $this->table . '
      WHERE id = ?';
      
      $stmt = $this->connection->prepare($query);

      $stmt->bindParam(1, $this->id);
      
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
      $this->id = $row['id'];
      $this->name = $row['name'];
      $this->email = $row['email'];
      $this->drink_counter = $row['drink_counter'];
    }

    public function create() {
      $query = 'INSERT INTO ' . 
        $this->table . ' 
      SET 
        name = :name,
        email = :email,
        password = :password,
        drink_counter = 0'
      ;
   
      $stmt = $this->connection->prepare($query);

      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);

      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);

      return false;

    }

    public function update() {
      $query = 'UPDATE ' . 
        $this->table . ' 
      SET 
        name = :name,
        email = :email,
        password = :password
      WHERE id = :id'
      ;
   
      $stmt = $this->connection->prepare($query);

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);

      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);

      return false;

    }

    public function delete() {
      $query = 'DELETE FROM ' . $this->table . ' WHERE  id = :id'; 
      
      $stmt = $this->connection->prepare($query);

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    public function drink() {
      $query = 'UPDATE ' . $this->table . '
      SET drink_counter = :drink_counter
      WHERE id = :id';

      $stmt = $this->connection->prepare($query);

      $stmt->bindParam(':drink_counter', $this->drink_counter);
      $stmt->bindParam(':id', $this->id);
      
      if($stmt->execute()) {
        return true;
      }

      printf("Error: %s.\n", $stmt->error);

      return false;
    }

  }