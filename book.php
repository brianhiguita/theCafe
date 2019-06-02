<?php include "includes/head.php"; ?>

  <div class="nav__wrapper--none">
      <?php include("includes/nav.php");?>
  </div>


<div class="container">

  <div class="row" style="margin: 0px;">
    <div class="col-md-12">
      <h3 class="book__date--title">Choose your booking date</h3>
    </div>
  </div>


  <div class="row">

  </div>

<?php 

    $day = date("d"); 
    $month = date("m");
    $year = date("y");

    // $month = $month + 1;


?>

      <?php echo build_calendar($month,$year); ?>


</div>


<?php include "includes/footer.php"; ?>
