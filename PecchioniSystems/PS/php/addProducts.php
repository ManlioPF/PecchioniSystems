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


   <div class="container">
     <!-- Page Heading -->

     <div class="col-lg-12">
       <div class="card mt-4">
       <div class="card-body">
         <h1 class="my-2">New Product</h1>

         <h6 style="color:red">
           <?php
             if(!isset($_POST['p_nombre']) || !isset($_POST['p_origen']) || !isset($_POST['p_precio']) || !isset($_POST['p_fabricante']) || !isset($_POST['p_cantidad']) || !isset($_POST['p_categoria']) || !isset($_POST['p_descripcion'])){
               echo "Fill all the inputs.";
             }else{
               $p_nombre = $_POST['p_nombre'];
               $p_origen = $_POST['p_origen'];
               $p_precio = $_POST['p_precio'];
               $p_fabricante = $_POST['p_fabricante'];
               $p_cantidad = $_POST['p_cantidad'];
               $p_categoria = $_POST['p_categoria'];
               $p_descripcion = $_POST['p_descripcion'];

               $result = mysqli_query($con,"SELECT * FROM producto ORDER BY id_producto DESC");
               $row = mysqli_fetch_array($result);

               $id = $row['id_producto'] + 1;
               $date =  date("h:i:sa") ." ". date("Y/m/d");

               $target_dir = "../img/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               // Check if image file is a actual image or fake image
               if(isset($_POST["submit"])) {
                   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                   if($check !== false) {
                       $uploadOk = 1;
                   } else {
                       echo "File is not an image.<br>";
                       $uploadOk = 0;
                   }
               }
               // Check if file already exists
               if (file_exists($target_file)) {
                   echo "Sorry, file already exists.<br>";
                   $uploadOk = 0;
               }
               // Check file size
               if ($_FILES["fileToUpload"]["size"] > 500000) {
                   echo "Sorry, your file is too large.<br>";
                   $uploadOk = 0;
               }
               // Allow certain file formats
               if($imageFileType != "png") {
                   echo "Sorry, only PNG files are allowed.<br>";
                   $uploadOk = 0;
               }
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                   echo "Sorry, your file was not uploaded.<br>";
               // if everything is ok, try to upload file
               } else {
                 $p_foto = basename($_FILES["fileToUpload"]["name"]);
                 $query =  "INSERT INTO producto VALUES". "(". $id . ",  '$p_nombre' , '$p_origen', '$p_descripcion', $p_precio, '$p_fabricante', $p_cantidad, './img/$p_foto', '$p_categoria', '$date')";
                 $result = mysqli_query($con, $query);

                 if($result){
                   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                     echo "The product '$p_nombre' with the image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to the Data Base.<br>";
                   } else {
                       echo "Sorry, there was an error uploading your file.<br>";
                   }
                 }else{
                    echo "Fill all the inputs.";
                 }
               }
             }

           ?>
         </h6>

         <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

           <div class="row">

            <!-- p_nombre -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Product Name</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="30" name="p_nombre" class="form-control" placeholder="Enter email">
                 </div>
               </div>
             </div>

            <!-- p_origen -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Country</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="p_origen" class="form-control" placeholder="Enter country">
                 </div>
               </div>
             </div>

            <!-- p_precio -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Price</label>
                 <div class="col-sm-12">
                   <input type="number" maxlength="11" name="p_precio" class="form-control" placeholder="Enter price">
                 </div>
               </div>
             </div>

            <!-- p_fabricante -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Company</label>
                 <div class="col-sm-12">
                   <input type="text" maxlength="20" name="p_fabricante" class="form-control" placeholder="Enter Company">
                 </div>
               </div>
             </div>

            <!-- p_cantidad -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Stock</label>
                 <div class="col-sm-12">
                   <input type="number" maxlength="11" name="p_cantidad" class="form-control" placeholder="Enter Stock">
                 </div>
               </div>
             </div>

            <!-- p_catogoria -->
             <div class="col-xl-6">
               <div class="form-group">
                 <label class="control-label col-sm-12">Category</label>
                 <div class="col-sm-12">
                   <select  class="form-control" name="p_categoria">
                     <option value="computer">Computer</option>
                     <option value="phone">Phone</option>
                     <option value="accesory">Accesory</option>
                   </select>
                 </div>
               </div>
             </div>

             <!-- file upload-->
              <div class="col-xl-6">
                <div class="form-group">
                  <label class="control-label col-sm-12">Select image to upload:</label>
                  <div class="col-sm-12">
                      <input type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
              </div>

            <!-- p_descripcion -->
             <div class="col-xl-12">
               <div class="form-group">
                 <label class="control-label col-sm-12">Description</label>
                 <div class="col-sm-12">
                   <textarea type="textarea" rows="5" maxlength="200" name="p_descripcion" class="form-control" placeholder="Enter a brief description"></textarea>
                 </div>
               </div>
             </div>

            <!-- Submit -->
             <div class="col-xl-12">
               <div class="form-group">
                 <div class="col-sm-12">
                   <button type="submit" name="submit" class="btn btn-primary btn-block">Insert Product</button>
                 </div>
               </div>
             </div>

           </div>
         </form>
       </div>
     </div>
    <!-- /.container -->

<?php include './headerAndFooter/footer.php';?>
