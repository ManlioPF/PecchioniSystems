<meta charset="UTF-8">
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $conn = mysqli_connect('localhost','root','','prueba1');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"DELETE FROM usuario_producto WHERE id_producto=$product AND u_mail='{$_SESSION['sess_user']}';");
    header("Location:./cart.php");
  }
?>
