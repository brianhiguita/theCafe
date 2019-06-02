<?php
require_once('db.php');
  class Database {
    // CONNECTION
    public $connection;
    // whenever this class is instantiated/run the construct check the database is connected
    function __construct(){
      $this->open_db_connection();
    }
    // add connect to database function to public $connection
    public function open_db_connection(){
      $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      // check if database connection exists
      if (mysqli_connect_errno()) {
        die('connection failed');
      }
    }
    // QUERY
    public function query($sql){
      $result = mysqli_query($this->connection, $sql);
      return $result;
    }
}
$database = new Database();
 ?>
