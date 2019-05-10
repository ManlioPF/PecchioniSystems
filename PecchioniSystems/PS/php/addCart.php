<meta charset="UTF-8">
<?php
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else {
    $product = $_POST['product'];
    $cantidad = $_POST['cantidad'];

    $con = mysqli_connect('localhost','root','','prueba1');
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $quantity = mysqli_query($con,"SELECT cantidad FROM usuario_producto WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product AND pagado=0");

    $resul_cant = mysqli_fetch_array($quantity);
    if($resul_cant['cantidad']>0){
      echo "act";
      $cantidad = $cantidad + $resul_cant['cantidad'];
      mysqli_query($con,"UPDATE usuario_producto SET cantidad = $cantidad WHERE u_mail='{$_SESSION['sess_user']}' AND id_producto=$product AND pagado=0");
    }else{
      echo "ins";
      $insert = "INSERT INTO usuario_producto VALUES"."("."$product, 0, $cantidad,'{$_SESSION['sess_user']}', NULL)";
      $result = mysqli_query($con,$insert);
    }

    header("Location:./cart.php");

  }
?>
