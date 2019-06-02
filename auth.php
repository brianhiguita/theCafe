<?php include "includes/head.php"; ?>




 <div class="row register__wrapper">

 <div class="nav__wrapper--none">
      <?php include("includes/nav.php");?>
</div>
   <div class="col s12 auth__content">

   <div class="auth__position">

<!-- register user -->
<?php
    if (isset($_POST['register'])) {
    $register_user = new User();
    $register_user->registerUser();
            if (!empty($errors = $register_user->errors)) {
                foreach ($errors as $error) {
                    echo "<p class='error__message'>ERROR : ". $error . "</p>";
                }
           
            }  
            else { 
                header("location: index.php");
            }
    }
?>      




<!-- register Booking -->
<?php
    if (isset($_POST['registerBooking'])) {
        if($_POST['time'] == 0) {
            echo "no date or time was selected please try again";
            header( "refresh:3;url=book.php" );
        } else {
            $register_booking = new Booking();
            $register_booking->registerBooking();
                if (!empty($errors = $register_booking->errors)) {
                    foreach ($errors as $error) {
                    echo "<p class='error__message'>ERROR : ". $error . "</p>";
                    }
                } else {
                    echo "Registered Booking";
                    header( "refresh:1;url=myAccount.php" );
                }
            }

        }
        

  
?>     

<?php

    if (isset($_POST['login'])) {
    $login_user = new User();
    $login_user->loginUser();
        if (!empty($errors = $login_user->errors)) {
            foreach ($errors as $error) {
            echo "<h5 class='auth__error'>ERROR : ". $error . " please try and sign in again or register a new account</h5>";
            }

        ?>

        <?php
        } else {
            // header( "refresh:5;url=myAccount.php" );
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo "signed in";
        }

    }
?>


    </div>

   </div>
 </div>

 
<?php include "includes/footer.php"; ?>

