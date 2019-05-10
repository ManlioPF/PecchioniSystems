<!DOCTYPE html>
<?
  session_start();
?>
<html lang="en">
<span title="Spanish"><a lang="es" href="index.<?php  ?>">Español</a></span>
  <head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PecchioniStore</title>
    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/shop-homepage.css" rel="stylesheet">

    <?php
      $con = mysqli_connect('localhost','root','','prueba1');
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
    ?>
  </head>


  <body>
    <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top mask" style="background: rgba(0, 123, 255, 0.75); text-shadow: 0px 0px 8px #000011; z-index: 1; box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);">
      <div class="container">
        <a class="navbar-brand" href="index.php">PecchioniStore</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="./php/sort.php"> Products</a>

            <?php
            session_start();
            if(isset($_SESSION['sess_user'])){
              echo "<li class='nav-item active'>";
                echo "<a class='nav-link' href='./php/cart.php'> |&nbsp &nbsp {$_SESSION['sess_user']}</a>";
              echo "</li>";

              echo "<li class='nav-item active'>";
                echo "<a class='nav-link' href='./php/logout.php'>Logout</a>";
              echo "</li>";
            }else{
              echo "<li class='nav-item active'>";
                echo "<a class='nav-link' href='./php/login.php'>|&nbsp &nbsp Login</a>";
              echo "</li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
