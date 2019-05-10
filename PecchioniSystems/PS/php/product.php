<meta charset="UTF-8">
<?php include './headerAndFooter/header.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Product -->
      <?PHP

        if (!isset($_POST['id'])){
          header("Location:../index.php");
        }else{
          $id = $_POST['id'];
          $result = mysqli_query($con,"SELECT * FROM producto WHERE id_producto = $id");

          $row = mysqli_fetch_array($result);
            echo "<br><h1 class='my-0'>". $row['p_nombre'] ."  ";
            echo "<small> - ". $row['p_fabricante'] ."</small></h1>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<a href='#'>";
            echo "<img class='img-fluid rounded mb-0 mb-md-0' src='.". $row['p_foto'] ."' alt=''>";
            echo "</a></div>";
            echo "<div class='col-md-5'><br><br><br>";
            echo "<p style='font-size: 30px;'>". $row['p_descripcion'] ."</p>";
            echo "<h3> $". $row['p_precio'] ."</h3><br>";
            echo "<h5 style='color: gray;'> Stock: ". $row['p_cantidad'] ."</h5><br>";
            if(isset($_SESSION['sess_user'])){
              if($row['p_cantidad']>0){
                echo "<form class='form-inline' action='./addCart.php' method='post'>";
                echo "<input type='hidden' name='product' value='{$row['id_producto']}'</input>";
                echo "<button type='submit' class='btn btn-primary'>Add to Cart</button>";
                echo "<div class='form-group'><h5> &nbsp&nbsp&nbsp Quantity: &nbsp</h5><input type='number' name='cantidad' min=1 max={$row['p_cantidad']} value=1 class='form-control'></div></form>";
              }
            }
            echo "</div></div>";
        }
      ?>
    </div>
    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
