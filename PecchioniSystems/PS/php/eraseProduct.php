<meta charset="UTF-8">
<?PHP
  session_start();

  if(!isset($_SESSION['sess_user'])){
    header("Location:../index.php");
  }else{
    $admin = $_SESSION['sess_user'];
    if($admin != 'admin@pecchioni.com'){
        header("Location:../index.php");
    }
  }

    $con = mysqli_connect('localhost','root','','prueba1');

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"DELETE FROM producto WHERE id_producto={$_POST['id_producto']}");
    header("Location: ./editProducts.php");
?>
