<meta charset="UTF-8">
<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:admin.php");
  }else {
    $con = mysqli_connect('localhost','root','','prueba1');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //From here
    $valido = true;
    $borrar=mysqli_query($con,"SELECT p.id_producto, p.p_cantidad, up.cantidad FROM producto p, usuario_producto up WHERE p.id_producto=up.id_producto AND u_mail='{$_SESSION['sess_user']}' AND pagado=0;");

    while($row = mysqli_fetch_array($borrar)){
      echo "Producto: {$row['id_producto']}<br>";
      echo "Carrito: {$row['p_cantidad']}<br>";
      echo "Usuario: {$row['cantidad']}<br>";

      $stock = $row['p_cantidad'] - $row['cantidad'];
      if($stock < 0){
        $valido = false;
      }
      echo "Resultado: $stock<br><br><br>";
    }

    if($valido == true){
      echo "Compra valida<br><br>";

      $ejecutar=mysqli_query($con,"SELECT p.id_producto, p.p_cantidad, up.cantidad FROM producto p, usuario_producto up WHERE p.id_producto=up.id_producto AND u_mail='{$_SESSION['sess_user']}' AND pagado=0;");
      while($fila = mysqli_fetch_array($ejecutar)){
        $stock = $fila['p_cantidad'] - $fila['cantidad'];
        mysqli_query($con,"UPDATE producto SET p_cantidad=$stock WHERE id_producto={$fila['id_producto']}");
      }

      $result = mysqli_query($con,"UPDATE usuario_producto SET pagado=1,  fecha_compra='". date("h:i:sa") ." ". date("Y/m/d") ."' WHERE u_mail='{$_SESSION['sess_user']}' AND pagado=0");
      header("Location: ./history.php");
    }else{
      header("Location: ./buyError.php");
    }

    //to here
  }
?>
