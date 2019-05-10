<meta charset="UTF-8">
<?php include './headerAndFooter/header.php';?>

    <!-- Page Content -->
    <div class="container">
      <div class="row my-3">
          <h2>Buying History</h2>
      </div>

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Bought Date</th>
          </tr>
        </thead>
        <tbody>

        <!-- Product -->
        <?PHP
          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          if(!isset($_SESSION['sess_user'])){
            header("Location:../index.php");
          }else {
            $result = mysqli_query($con,"SELECT DISTINCT u.u_mail,p.p_foto, p.p_nombre, p.p_precio, up.cantidad, up.id_producto, up.fecha_compra FROM usuario_producto up, producto p, usuario u WHERE up.id_producto=p.id_producto AND u.u_mail=up.u_mail AND up.u_mail='{$_SESSION['sess_user']}' AND pagado=1;");

            while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                echo "<td class='align-middle'> <img src='.".$row['p_foto']."' style='height:130px;'> </td>";
                echo "<td class='align-middle'> <h4>{$row['p_nombre']} </h4></td>";
                echo '<td class="align-middle"> <h4>$'. $row["p_precio"] .'</h4></td>';
                echo "<td class='align-middle'> <h4>{$row['cantidad']} </h4></td>";
                echo "<td class='align-middle'> <h4>{$row['fecha_compra']} </h4></td>";
              echo "</tr>";
            }
          }
        ?>

        </tbody>
      </table>
    </div>
    <!-- /.container -->
<?php include './headerAndFooter/footer.php';?>
