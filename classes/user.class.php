<?php

  class User {

    public $errors = [];

    // Register User
    public function registerUser() {

      global $database;
    // escape string
      $user_name = mysqli_real_escape_string($database->connection, $_POST['user_name']);
      $user_password = mysqli_real_escape_string($database->connection, $_POST['password']);

    // if empty add to error
      if (empty($user_name)) {
        array_push($this->errors, "username is required");
      }

      if (empty($user_password)) {
        array_push($this->errors, "password is required");
      }

    // if user already exists
      $exists_sql = "SELECT * FROM users WHERE user_name='$user_name'";
      $user_exists = $this->existsQuery($exists_sql);
      if (mysqli_num_rows($user_exists) > 0 ) {
        array_push($this->errors, "username already exists");
      }

    // if not errors add to database
      if (count($this->errors) == 0 ) {
        $sql = "INSERT INTO `users` (`user_name`, `user_password`) VALUES ('$user_name', '$user_password')";
        $this->userQuery($sql);
        $_SESSION['user'] = $_POST['user_name'];
      }
    }

    // login User
    public function loginUser() {
  // does user exists
      global $database;
    // escape string
      $user_name = mysqli_real_escape_string($database->connection, $_POST['login_name']);
      $user_password = mysqli_real_escape_string($database->connection, $_POST['login_password']);

    // if empty add to error
      if (empty($user_name)) {
        array_push($this->errors, "username is required");
      }

      if (empty($user_password)) {
        array_push($this->errors, "password is required");
      }

      $exists_sql = "SELECT * FROM users WHERE user_name='$user_name'";
      $user_exists = $this->existsQuery($exists_sql);
      if (mysqli_num_rows($user_exists) == 0 ) {
        array_push($this->errors, "username does not exists");
      } elseif (mysqli_num_rows($user_exists) > 0) {
        $checkPassword_sql = "SELECT * FROM users WHERE user_name='$user_name' AND user_password = '$user_password'";
        $checkPassword = $this->existsQuery($checkPassword_sql);

        if (mysqli_num_rows($user_exists) == 1 && mysqli_num_rows($checkPassword) == 0) {
          array_push($this->errors, "incorrect password");
        } elseif (mysqli_num_rows($user_exists) > 0 && mysqli_num_rows($checkPassword) > 0) {
          // echo "SIGNED IN";
          $_SESSION['user'] = $_POST['login_name'];
        }
      }
    }

    // exists in database
    protected function existsQuery($exists_sql) {
      $result = $this->userQuery($exists_sql);
      return $result;
    }

    // db query

    protected function userQuery($sql) {
      global $database;
      $result = $database->query($sql);
      return $result;
    }


  // end of class
  }




 ?>
