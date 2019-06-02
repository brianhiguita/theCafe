

<?php include "includes/head.php"; ?>







<div class="main__image main__image--register container">

  <?php include "includes/nav.php"; ?>

  <div class="row register__wrapper">
    <div class="col s12 register__content">
      <div class="form__box">

        <?php
          if (isset($_POST['submit'])) {
            $register_user = new User();
            $register_user->registerUser();
            if (!empty($errors = $register_user->errors)) {
              foreach ($errors as $error) {
                echo "<p class='error__message'>ERROR : ". $error . "</p>";
              }
            }
          }
        ?>

        <h5 class="account__header">Register Account</h5>
        <form class="account__form" action="register.php" method="post">
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
          <input class="btn-small form__submit" type="submit" name="submit" value="submit">
        </form>


      </div>
    </div>
  </div>
</div>



<?php include "includes/footer.php"; ?>
