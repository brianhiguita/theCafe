<?php include "includes/head.php"; ?>


 <div class="row register__wrapper">
   <div class="col s12 auth__content">


      <?php
        if (isset($_POST['registerBooking'])) {
          echo "Registered";
          $register_booking = new Booking();
          $register_booking->registerBooking();
          if (!empty($errors = $register_booking->errors)) {
            foreach ($errors as $error) {
              echo "<p class='error__message'>ERROR : ". $error . "</p>";
            }
          }
        }
      ?>       

   </div>
 </div>
