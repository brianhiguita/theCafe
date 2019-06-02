<?php include "includes/head.php"; ?>

 <div class="row register__wrapper">
   <div class="col s12 auth__content">

       <?php

         if (isset($_POST['login'])) {
           $login_user = new User();
           $login_user->loginUser();
           if (!empty($errors = $login_user->errors)) {
             foreach ($errors as $error) {
               echo "<h5 class='auth__error'>ERROR : ". $error . "</h5>";
             }

             ?>

           <?php
           }

           else {
              header( "refresh:5;url=index.php" );
              echo "signed in";
           }

         }
        ?>

   </div>
 </div>
