<?php include "includes/head.php"; ?>

<p>hello</p>

<?php
 $bookDate = new Booking();
 $bookDate->registerBooking();

 if ($bookDate->errors) {
   foreach ($bookDate->errors as $error) {
    echo $error;
   }
 } else {
   echo "booking confirmed";
   header( "refresh:3;url=myAccount.php" );
 }


 ?>

 <?php



  ?>



<?php include "includes/footer.php"; ?>
