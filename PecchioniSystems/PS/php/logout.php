<meta charset="UTF-8">
<?php
  session_start();
  unset($_SESSION['sess_user']);
  session_destroy();
  header("Location: ../index.php");
?>