<?php include "includes/head.php"; ?>


 <div class="row register__wrapper">
   <div class="col s12 auth__content">


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

   </div>
 </div>
