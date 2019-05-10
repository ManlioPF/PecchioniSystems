<head>
<meta charset="UTF-8">
</head>
<?php include './header.php';?>

  <link href="./css/ps-css.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-xl-2">
          <form action='./php/sort.php' method='post'>
            <?php include './php/sortMenu.php';?>
          </form>
        </div>


        <!-- /.col-lg-3 -->
        <div class="col-xl-10">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="./img/consolas/xbox.png" href="index.php" alt="Consola Xbox X">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="./img/consolas/ns.png" alt="Consola Nintendo Switch">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="./img/consolas/ps4.png" alt="Consola PlayStation 4  ">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="./img/consolas/steam.png" alt="Platataforma De Juego Steam">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            <?PHP
              $result = mysqli_query($con,"SELECT * FROM producto");

              while($row = mysqli_fetch_array($result)) {
                echo "<div class='col-lg-4 col-md-6 mb-4'>";
                echo "<div class='card card text-center'>";
                echo "<form action='./php/product.php' method='post'>";
                echo "<button type='submit' class='btn btn-link' name='id' value='{$row['id_producto']}'><img class='card-img-top' src='". $row['p_foto'] ."' alt=''></button>";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>";
                echo "<input type='hidden' value='{$row['id_producto']}' name='id'></input>";
                echo "<button type ='submit' class='btn btn-outline-primary btn-large'>";
                echo "". $row['p_nombre'] ."</button></form></h4>";
                echo "<h5>$". $row['p_precio'] ."</h5>";
                echo "<p class='card-text'>". $row['p_descripcion'] ."</p></div>";
                echo "<div class='card-footer'>";
                echo "<small class='text-muted'>".$row['p_fabricante']." - ".$row['p_origen']."</small>";
                echo "</div></div></div>";
              }
            ?>



          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include './php/headerAndFooter/footer.php';?>
