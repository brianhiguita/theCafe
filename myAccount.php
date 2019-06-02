<?php include "includes/head.php"; ?>

<div class="nav__wrapper--none">
      <?php include("includes/nav.php");?>
</div>


  <?php
    if (isset($_POST['register'])) {
      $register_user = new User();
      $register_user->registerUser();
      if (!empty($errors = $register_user->errors)) {
        foreach ($errors as $error) {
          echo "<p class='error__message'>ERROR : ". $error . "</p>";
        }
      }
    }
  ?>       


<div class="container">

  <div class="row">

    <div class="col 12 account__header--title">
      <?php

        if (isset($_SESSION['user'])) {
          echo "<h5 class='account__header'>Hello " . $_SESSION['user'] . " these are you current bookings</h5>";
        }
        else {
          print_r($_SESSION);
          echo "redirect";
        }
      ?>
    </div>

    <div class="col s12">
        <?php       
        $bookedDates = new Booking();
        $bookedDates->userBooking($_SESSION['user']);
        ?>
    </div>
  </div>
    
</div>



<?php include "includes/footerOther.php"; ?>
