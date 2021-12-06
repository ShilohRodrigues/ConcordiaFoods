<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Concordia Foods</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container-xxl pt-2">
    <!-- Header-->
    <header id="mainHeader">
      <div id="logo">
        <a href="index.php"><img class="img-fluid" src="images/CFlogo.png" alt="Concordia Foods"></a>
      </div>
      <nav>
        <div class="dropdown">
          <?php if(isset($_SESSION['StudentID'])){echo "<button class='dropbtn'>".$_SESSION['StudentID']."</button>";}
                  else{echo "<button class='dropbtn'>Account</button>";}?>
          <div class="dropdown-content">
            <?php
            if(isset($_SESSION['StudentID'])){echo'<a href="FrontEndPages/Logout.php">Logout</a>';}
            else{echo'<a href="FrontEndPages/login.php">Login</a>';}
            ?>
            <?php if(!(isset($_SESSION['StudentID']))) {echo '<a href="FrontEndPages/signup.php">Sign Up</a>';} ?>
          </div>
        </div>
        <a href="FrontEndPages/Cart_P4.php">View Cart</a>
        <div class="dropdown">
          <button class="dropbtn">Products</button>
          <div class="dropdown-content">
            <a href="AislePages/aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a>
            <a href="AislePages/aisle.php?aisle=Meats">Meats</a>
            <a href="AislePages/aisle.php?aisle=Frozen Foods">Frozen Foods</a>
            <a href="AislePages/aisle.php?aisle=Snacks">Snacks</a>
            <a href="AislePages/aisle.php?aisle=Drinks">Drinks</a>
          </div>
        </div>
        <a href="index.php" class="active">Home</a>
      </nav>
    </header>

    <div id="homeHeader">
      <img src="images/CFlogo.png" alt="Concordia Foods">
    </div>

    <!-- Banner code start-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="AislePages/aisle.php?aisle=Drinks">
            <img class="d-block w-100" src="images/coke.jpg" alt="First slide">
          </a>
        </div>
        <div class="carousel-item">
          <a href="AislePages/aisle.php?aisle=Fruits and Vegetables">
            <img class="d-block w-100" src="images/fruits.jpg" alt="Second slide">
          </a>
        </div>
        <div class="carousel-item">
          <a href="AislePages/aisle.php?aisle=Meats">
            <img class="d-block w-100" src="images/download.jpg" alt="Third slide">
          </a>
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
    <!-- Banner code end  -->

    <h1 id="catTitle"> Our Categories</h1>


    <!-- Categories start -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card">
          <a href="AislePages/aisle.php?aisle=Fruits and Vegetables">
            <img src="images/bananaCat.png" class="card-img-top" alt="Variety of fruits">
            <div class="card-body">
              <h5 class="card-title">Fruits and Vegetables Aisle</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <a href="AislePages/aisle.php?aisle=Meats">
            <img src="images/chickenCat.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Meat Aisle</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <a href="AislePages/aisle.php?aisle=Drinks">
            <img src="images/cokeZero.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Drink Aisle</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <a href="AislePages/aisle.php?aisle=Frozen Foods">
            <img src="images/frozenCat.png" class="card-img-top" alt="..." width="30%">
            <div class="card-body">
              <h5 class="card-title">Frozen Aisle</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <a href="AislePages/aisle.php?aisle=Snacks">
            <img src="images/snacksCat.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Snacks Aisle</h5>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- Categories end -->

    <!-- Footer start -->
    <footer id="mainFooter">
      <img id="logo" class="img-fluid" src="images/CFlogo.png" alt="Concordia Foods logo">
      <div class="ftMain">
        <div class="ftList">
          <p>Aisles</p>
          <ul>
            <li><a href="AislePages/aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a></li>
            <li><a href="AislePages/aisle.php?aisle=Meats">Meats</a></li>
            <li><a href="AislePages/aisle.php?aisle=Frozen Foods">Frozen Foods</a></li>
            <li><a href="AislePages/aisle.php?aisle=Snacks">Snacks</a></li>
            <li><a href="AislePages/aisle.php?aisle=Drinks">Drinks</a></li>
          </ul>
        </div>
        <div class="ftList">
          <p>Login/Sign Up</p>
          <ul>
            <li><a href="FrontEndPages/login.php">Login</a></li>
            <li><a href="FrontEndPages/signup.php">Sign Up</a></li>
          </ul>
        </div>
        <div class="ftList">
          <p>Authors</p>
          <ul>
            <li>Shiloh Rodrigues</li>
            <li>Amrit Sohpal</li>
            <li>Adam Farahat</li>
            <li>Ravish Mahajan</li>
            <li>Brahim Hamid</li>
          </ul>
        </div>
        <?php if(isset($_SESSION['StudentID'])) {
              if(strcmp($_SESSION['StudentID'], 'Admin') == 0) {
                echo '
                <div class="ftList">
                <p>Backend Functions</p>
                <ul>
                  <li><a href="BackEndPages/ProductList.php">Product List</a></li>
                  <li><a href="BackEndPages/p8.php?prod=new">Edit a Product</a></li>
                  <li><a href="BackEndPages/UsersList.php">User List</a></li>
                  <li><a href="BackEndPages/User_Edit.php?user=new">Edit a User</a></li>
                  <li><a href="BackEndPages/p11.php">Order List</a></li>
                  <li><a href="BackEndPages/Order_Edit.php?orderNumber=new">Edit an Order</a></li>
                </ul>
              </div>';
              }
            } ?>    
      </div>
    </footer>
  </div>
  <!-- Footer end -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>
