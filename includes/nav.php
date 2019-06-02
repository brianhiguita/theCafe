<?php

  // if (isset($_POST['login'])) {
  //   $login_user = new User();
  //   $login_user->loginUser();
  //   if (!empty($errors = $login_user->errors)) {
  //     foreach ($errors as $error) {
  //       echo "<h5>ERROR : ". $error . "</h5>";
  //     }
  //   }

  // }
 ?>



<nav>

  <div class="nav-wrapper">

    <ul class="nav container"> 

      <?php

      if (isset($_SESSION['user'])) {  ?>

        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="book.php">Book</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="myAccount.php">My Account</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>

      <?php } ?>


      <?php

      if (!isset($_SESSION['user'])) {  ?>


        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="book.php">Book</a>
        </li>

        <li class="nav-item">
            <a class="nav-link modal-trigger" href="#modal_login">Login</a>
        </li>

        <li class="nav-item">
            <a class="nav-link modal-trigger" href="#modal_register">Register</a>
        </li>

      <?php } ?>


      <!-- Modal Trigger -->

      <!-- Modal Structure -->


      <div id="modal_login" class="modal">

        <div class="modal-content modal__wrapper">

            <h5 class="account__header">Login</h5>

            <form class="account__form" action="auth.php" method="post">
              <label class="form__label" for="">Username</label>
              <br>
              <input class="form__input" type="text" name="login_name" autocomplete="off" value="">
              <br>
              <label class="form__label" for="">Password</label>
              <br>
              <input class="form__input" type="password" name="login_password" autocomplete="off" value="">
              <br>
              <input class="modal__buttons form__submit" type="submit" name="login" autocomplete="off" value="Login">
            </form>

        </div>

      </div>




      <div id="modal_register" class="modal">

        <div class="modal-content modal___wrapper">

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
              <input class="modal__buttons form__submit" type="submit" name="register" value="register">

            </form>

        </div>

      </div>

    </ul>
  </div>

</nav>
