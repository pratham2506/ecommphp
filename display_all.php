<?php
include('includes/connect.php');
include('functions/commonfunctions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Ecommerce Website</title>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Cart <sup><?php cart_item(); ?></sup> </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
            </li>
          </ul>
          <form class="d-flex" role="search" action="searchproduct.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
            <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
            <input type="submit" value="Search" class="btn btn-info" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>


    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </nav>


    <!-- third child -->
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut, voluptatum?</p>


    <!-- forth child -->
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
        <div class="row">
          <!-- Fetching Products -->
          <?php 
            get_all_products();
            getuniquecategories();
            getuniquebrands();
          ?>
          
          
        </div>
      </div>
      <div class="col-md-2 bg-secondary p-0">
        <!-- Brands displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
          </li>


          <?php 
            getbrands();
          ?>
        </ul>

        <!-- Categories displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
          </li>
          <?php 
            getcategory();
          ?>
          
        </ul>


      </div>
    </div>
  </div>
</body>

</html>