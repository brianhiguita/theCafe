<?php include "includes/head.php"; ?>

<div class="nav__wrapper--none">
      <?php include("includes/nav.php");?>
</div>


<div class="container">

  <div class="row">
    <div class="col-md-12">
      <h3 class="book__date--title"> Please select your booking time</h3>
    </div>
  </div>



  <div class="row">

    <div class="col s4">

      <?php

        $previous = $_GET['date'];
        $str = $previous;
        $array1 = str_split($str);
        // print_r($array1);

        if ($array1[9] -  1 == 0 && $array1[8] == 0 ) {
          echo "Previous Month, Go back to Calendar for more dates";
        } else {
          $array1[9] = $array1[9] - 1;
          $joined = join($array1);
          print_r($joined);
          $previousAvailable = new Booking();
          $previousAvailable->isBooked($joined);
          $booked = "green__button";
          
          $previousString = (string) $joined;

        
        
        ?>

        <?php for ($i=9; $i < 19 ; $i++) { ?>

          <?php for ($k=0; $k < count($previousAvailable->available); $k++) {
                  if ($i == $previousAvailable->available[$k]) {
                    $booked = "red__button";
                    // echo "<option value=''>" . $i . "</option>";
                  }
                } 
          ?>

            <button class="bookings <?php echo $booked; ?>" value="<?php echo $i ?>" onclick="previousBookingTime(<?php echo $i; ?>, '<?php echo $previousString;?>')"><p><?php echo $i ?>:00</p></button>

            <?php $booked = "green__button"; ?>

          <?php } ?>

          <?php
          // end of else statemen
          }
          ?>
      
    </div>


    <div class="col s4">



      <?php
      $getDate = $_GET['date'];

        $isAvailable = new Booking();
        $isAvailable->isBooked($getDate);
        echo $getDate; 
        $dateString = (string) $getDate;
        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $dateString);
        $booked = "green__button";
      ?>

        <?php for ($i=9; $i < 19 ; $i++) { ?>

              <?php for ($k=0; $k < count($isAvailable->available); $k++) {
                if ($i == $isAvailable->available[$k]) {
                  $booked = "red__button";
                  // echo "<option value=''>" . $i . "</option>";
                }
              } ?>

              <button class="bookings <?php echo $booked; ?>" value="<?php echo $i ?>" onclick="bookTime(<?php echo $i ;?>, <?php echo $string ;?>)"><p><?php echo $i ?>:00</p></button>
       

              <?php $booked = "green__button"; ?>

        <?php } ?>

    </div>


    <div class="col s4">

      <?php

        $next = $_GET['date'];
        $str = $next;
        $array1 = str_split($str);
        // print_r($array1);

        if ($array1[9] + 1 == 10 && $array1[8] == 3) {     
            echo "Next Month, Go back to Calendar for more dates this one";
            
        }

        elseif ($array1[9] + 1 == 2 && $array1[8] == 2) {
          echo "Next Month, Go back to Calendar for more dates";
        }
      
        else {
          $array1[9] = $array1[9] + 1;
          $joined = join($array1);
          print_r($joined);
          $previousAvailable = new Booking();
          $previousAvailable->isBooked($joined);
          $booked = "green__button";
          
        
        ?>

        <?php for ($i=9; $i < 19 ; $i++) { ?>

          <?php for ($k=0; $k < count($previousAvailable->available); $k++) {
                  if ($i == $previousAvailable->available[$k]) {
                    $booked = "red__button";

                  }
                } 
          ?>

            <button class="bookings <?php echo $booked; ?>" value="<?php echo $i ?>" onclick="nextBookingTime(<?php echo $i; ?>, '<?php echo $joined;?>')"><p><?php echo $i ?>:00</p></button>

            <?php $booked = "green__button"; ?>

          <?php } ?>

          <?php
          // end of else statement       
          }
          ?>

    </div>


<!-- USE JS FOR FORM INFO  -->

    <?php 
    
    if (isset($_SESSION['user'])) {
      
    ?>

    <div class="col s12">
      <form class="" action="auth.php" method="post">
        <input id="timeValue" type="hidden" name="time" value="" required>
        <input id="dateValue" type="hidden" name="date" value="" required>
        <input id="dateValue" type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>" required>
        <input type="submit" class="btn" name="registerBooking" value="Book Selected">
      
      </form>
    </div>
    
    <?php
    } else {
      echo "<div class='row'><p style='padding-left: 11.25px; font-size: 20px; margin-top: 50px;'>user must be signed in to make booking<p></div>";
    ?>
        <div class="booking__login">
          <a class="modal-trigger btn" href="#modal_login">Login</a>
          <a class="modal-trigger btn" href="#modal_register">Register</a>
        </div>

        <div id="modal_login" class="modal">

        <div class="modal-content">

            <h5 class="account__header">Login</h5>

            <form class="account__form" action="auth.php" method="post">
              <label class="form__label" for="">Username</label>
              <br>
              <input class="form__input" type="text" name="login_name" value="">
              <label class="form__label" for="">Password</label>
              <br>
              <input class="form__input" type="password" name="login_password" value="">
              <br>
              <input class="btn-small form__submit" type="submit" name="login" value="Login">
            </form>

        </div>

      </div>

      <div id="modal_register" class="modal">

        <div class="modal-content">

            <h5 class="account__header">Register</h5>

            <form class="account__form" action="auth.php" method="post">
              <label class="form__label" for="">Username</label>
              <br>
              <input class="form__input" type="text" name="user_name" autocomplete="off" value="">
              <br>
              <label class="form__label" for="">password</label>
              <br>
              <input class="form__input" type="password" name="password" autocomplete="off" value="">
              <br>
              <label class="form__label" for="">confirm password</label>
              <br>
              <input class="form__input" type="password" name="confirm_password" autocomplete="off" value="">
              <br>
              <input class="btn-small form__submit" type="submit" name="register" value="register">
            </form>

        </div>

      </div>

    <?php  
    }
    
    ?>

  </div>

</div>




<?php include "includes/footer.php"; ?>




 