<meta charset="UTF-8">
<?php include './headerAndFooter/header.php';?>


    <link href="../css/ps-css.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h2 class="my-4">Product Search

        <?php
          if (isset($_POST['category'])  && !isset($_POST['sort'])){
            echo"<small class='text-muted'>by category</small>";
          }else if (!isset($_POST['category'])  && isset($_POST['sort'])){
            echo"<small class='text-muted'>sorted</small>";
          }else if (isset($_POST['category'])  && isset($_POST['sort'])){
            echo"<small class='text-muted'>by category and sorted</small>";
          }
        ?>
         <meta charset="UTF-8">
      </h1>




      <div class="row">
        <div class="col-xl-2">
          <form action='' method='post'>
            <?php include './sortMenu.php';?>
          </form>
        </div>


        <div class="col-xl-10" style="padding-left:40px;">
          <?PHP
            if (isset($_POST['submit']) && isset($_POST['category'])  && !isset($_POST['sort'])){
              $categoria = $_POST['category'];
              $result = mysqli_query($con,"SELECT * FROM producto WHERE p_categoria = '$categoria'");
            }else if (isset($_POST['submit']) && !isset($_POST['category'])  && isset($_POST['sort'])){
              $sort = $_POST['sort'];
              $result = mysqli_query($con,"SELECT * FROM producto ORDER BY $sort");
            }else if (isset($_POST['submit']) && isset($_POST['category'])  && isset($_POST['sort'])){
              $categoria = $_POST['category'];
              $sort = $_POST['sort'];
              $result = mysqli_query($con,"SELECT * FROM producto WHERE p_categoria = '$categoria' ORDER BY $sort");
            }else{
              $result = mysqli_query($con,"SELECT * FROM producto");
            }

            while($row = mysqli_fetch_array($result)) {
              echo "<div class='row'>";
                echo "<div class='col-lg-4 px-12'>";
                  echo "<a href='#'>";
                    echo "<img class='img-fluid rounded mb-0 mb-md-0'  src='.{$row['p_foto']}' alt=''>";
                  echo "</a>";
                echo "</div>";
                echo "<div class='col-lg-6'>";
                  echo "<h3>{$row['p_nombre']}</h3>";
                  echo "<p>{$row['p_descripcion']}.</p>";
                  echo "<h3> $". $row['p_precio'] ."</h3>";
                  echo "<p class='text-muted'>{$row['p_fabricante']} - {$row['p_origen']}</p><br>";
                  echo "<p><form action='./product.php' method='post'>";
                    echo "<button class='btn btn-primary' type='submit' name='id' value={$row['id_producto']} style='position:absolute; bottom: 5px;'> View Product </button>";
                  echo "</form></p>";
                echo "</div>";
              echo "</div>";
              echo "<hr>";
            }
          ?>
        </div>
      </div>
    </div>
    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
