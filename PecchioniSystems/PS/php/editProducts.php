<meta charset="UTF-8">
<?php include './headerAndFooter/header.php';?>

  <?PHP
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_SESSION['sess_user'])){
      header("Location:../index.php");
    }else{
      $admin = $_SESSION['sess_user'];
      if($admin != 'admin@pecchioni.com'){
          header("Location:../index.php");
      }
    }
   ?>
    <style>
      .box {
        padding-top: 3px;
        border:1px;
        border-style: solid;
        border-color:#DDD;
        border-radius: 5px;
        word-wrap: break-word;
        font-size: 15px;
        text-align: center;
      }
      .titlebox {
        color:white;
        background-color: #222;
      }
    </style>


   <div class="container">
     <!-- Page Heading -->
     <h1 class="my-3">Product Catalog</h1>
       <div class='row my-6' >
           <div class="col-xl-1 titlebox box">
             Nombre
           </div>

           <div class="col-xl-1 titlebox box">
             Pais
           </div>

           <div class="col-xl-3 titlebox box">
             Descripción
           </div>

           <div class="col-xl-1 titlebox box">
             Precio
           </div>

           <div class="col-xl-1 titlebox box" style="font-size:13px">
            Fabricante
           </div>

           <div class="col-xl-1 titlebox box" style="font-size:14px">
             Cantidad
           </div>

           <div class="col-xl-1 titlebox box">
             Foto
           </div>

           <div class="col-xl-1 titlebox box" style="font-size:14px">
             Categoria
           </div>

           <div class="col-xl-1 titlebox box" style="font-size:14px; padding-bottom:7px">
             Fecha de Ingreso
           </div>

           <div class="col-xl-1 titlebox box">
           </div>
     </div>
     <?php
         if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
         }


           $result = mysqli_query($con,"SELECT * FROM producto");


           while($row = mysqli_fetch_array($result)) {
                          echo "<form action='./eraseProduct.php' method='post'>";
             echo "<div class='row my-6' >";

             echo "<div class='col-xl-1 box'><p style='font-size:12px;'>{$row['p_nombre']}</div>";
             echo "<div class='col-xl-1 box'><p>{$row['p_origen']}</div>";
             echo "<div class='col-xl-3 box'><p style='font-size:12px;'>{$row['p_descripcion']}</div>";
             echo "<div class='col-xl-1 box'><p>".'$'."{$row['p_precio']}</div>";
             echo "<div class='col-xl-1 box'><p>{$row['p_fabricante']}</div>";
             echo "<div class='col-xl-1 box'><p>{$row['p_cantidad']}</div>";
             echo "<div class='col-xl-1 box'><img src='.{$row['p_foto']}' style='max-width:100%; display:block; max-height:100%;'></img></div>";
             echo "<div class='col-xl-1 box'><p style='font-size:14px;'>{$row['p_categoria']}</div>";
             echo "<div class='col-xl-1 box'><p style='font-size:11px;'>{$row['p_fecha']}</div>";
             echo "<div class='col-xl-1 box'><button class='btn btn-primary btn-sm' name='id_producto' value ={$row['id_producto']} type='submit'>Eliminar</div>";
             echo "<input type='hidden' value='{$row['id_producto']}'>";

             echo "</div>";
             echo "</form>";
           }

     ?>


         </div>

       </div>


    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
