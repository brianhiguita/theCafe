<?php

  class Booking {

    public $errors = [];
    public $available = [];



    public function userBooking($user) {

      $sql = "SELECT * FROM `bookings` WHERE `user_name` = '$user'";
      $bookings = $this->existsQuery($sql);

      while ($row = mysqli_fetch_assoc($bookings)) {
          echo "<div class='col s6 account__booking--wrapper'> <div class='account__booking card'> <p>Booking Date : " . $row['time'] . ":00 </p><p> ". $row['date'] . "</p></div></div>";
      }
    }


    public function isBooked($theDate) {

      $sql = "SELECT * FROM `bookings` WHERE `date` = '$theDate'";
      $bookings = $this->existsQuery($sql);

      while ($row = mysqli_fetch_assoc($bookings)) {
          // echo $row['available'];
          if ($row['available']) {
            array_push($this->available, $row['time']);
          }
      }
    }

    public function registerBooking() {

        $user = $_POST['user'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $queryCheck = "SELECT * FROM `bookings` WHERE `date` = '$date' AND `time` = '$time'";
        $bookingExists = $this->existsQuery($queryCheck);

        if (mysqli_num_rows($bookingExists) < 1 ) {
          $sql = "INSERT INTO `bookings` (`date`, `user_name`, `time`, `available`) VALUES ('$date', '$user', '$time', '1')";
          $register = $this->bookingQuery($sql);
        } else {
          array_push($this->errors, "The booking Time " . $time . ":00 is unavailable");
        }

    }


    // exists in database
    protected function existsQuery($exists_sql) {
      $result = $this->bookingQuery($exists_sql);
      return $result;
    }

    // db query

    protected function bookingQuery($sql) {
      global $database;
      $result = $database->query($sql);
      return $result;
    }


  // end of class
  }



 ?>
