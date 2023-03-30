<?php

include_once "Database.php";

class Core extends Database {

  public $conn;

  public function __construct($db) {
    // echo "<br>Core Connect";
    return $this->conn = $db;
    // $sql =  $this->conn->query("SELECT * FROM testox");
    // print_r($sql);
  }

  public function read($tablename) {
    // echo "<br>work $tablename";
    // print_r($this->conn->query("SELECT * FROM $tablename"));
    return $this->conn->query("SELECT * FROM $tablename");
  }

  public function readSingle($tablename, $id) {
    $query = "SELECT * FROM " . $tablename . " WHERE id = $id limit 0,1";
    $result = $this->conn->query($query);
    return $result;
  }

  public function where_in(){
    $data = func_get_args();
    return implode(',',array_values($data));
  }

  public function numrow($tablename) {
     $sql = $this->conn->query("SELECT * FROM testox");
     return $sql->num_rows;
  }

}


// print_r($db);
// $db = $obj->myfun();
// print_r($db);
