<?php include "includes/head.php"; ?>

<?php

  if (isset($_POST['submit'])) {
    $login_user = new User();
    $login_user->loginUser();
    if (!empty($errors = $login_user->errors)) {
      foreach ($errors as $error) {
        echo "<h5>ERROR : ". $error . "</h5>";
      }
    }

  }
 ?>


 <div class="main__image main__image--register container">

   <?php include "includes/nav.php"; ?>

   <div class="row register__wrapper">
     <div class="col s12 register__content">
       <div class="form__box">
         <h5 class="account__header">Login</h5>

         <form class="account__form" action="" method="post">
           <label class="form__label" for="">Username</label>
           <br>
           <input class="form__input" type="text" name="login_name" value="">
           <label class="form__label" for="">Password</label>
           <br>
           <input class="form__input" type="password" name="login_password" value="">
           <br>
           <input class="btn-small form__submit" type="submit" name="submit" value="Login">
         </form>

       </div>
     </div>
   </div>
 </div>



<?php include "includes/footer.php"; ?>
