<meta charset="UTF-8">
<?php include './headerAndFooter/header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:../index.php");
    }else {
      $admin = $_SESSION['sess_user'];
      if($admin != 'admin@pecchioni.com'){
          header("Location:../index.php");
      }
    }
   ?>


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-5">Pagina de Administración
        <small>Selecciona una Opción</small>
      </h1>

      <div class="row">
        <div class="col-lg-6 col-sm-6 portfolio-item ">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top:10px;">
              <a href="./addProducts.php"><img class="card-img-top" src="../img/consolas/añadir.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./addProducts.php">Añadir Productos</a>
              </h4>
              <p class="card-text">Aquí puedes ingresar el registro de nuevos productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-sm-6 portfolio-item text-center">
          <div class="card card text-center">
            <div class="align-middle" style="width: 200px; height: 200px; margin:auto; padding-top: 10px;">
              <a href="./editProducts.php"><img class="card-img-top" src="../img/consolas/modificar.png" alt=""></a>
            </div>
            <div class="card-body">
              <h4 class="card-title">
                <a href="./editProducts.php">Historial/Modificar Productos</a>
              </h4>
              <p class="card-text">Aquí puedes consultar, modificar o eliminar el registro de los productos en la Base de Datos.</p>
            </div>
          </div>
        </div>

    </div>
    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
