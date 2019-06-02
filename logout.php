<?php include "includes/head.php"; ?>

<?php
session_destroy();
echo "You have been signed out";
header("Location: index.php");
?>

<?php include "includes/footer.php"; ?>
