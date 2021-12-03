<!DOCTYPE html>
<html lang="en">

<?php 
    //Get the aisle from the url
    $aisle = $_GET['aisle'];
    $jsonFile = file_get_contents("../BackEndPages/Databases/ProductList.json");
    $jsonFileDecoded = json_decode($jsonFile, true);
?>

<head>
  <meta charset="utf-8">
  <meta name="Description" content="Page #2, Aisles">
  <meta name="Author" content="Shiloh Rodrigues">
  <meta name="keywords" content="grocery, food, store">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <title>Concordia Foods</title>
</head>

<body>

  <div class="container-xxl pt-2">

    <header id="mainHeader">
      <div id="logo">
        <a href="../index.html"><img class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods"></a>
      </div>
      <nav>
        <div class="dropdown">
          <button class="dropbtn">Account</button>
          <div class="dropdown-content">
            <a href="../FrontEndPages/login.html">Login</a>
            <a href="../FrontEndPages/p6.html">Sign Up</a>
          </div>
        </div>
        <a href="../FrontEndPages/Cart_P4.html">View Cart</a>
        <div class="dropdown">
          <button class="dropbtn active">Products</button>
          <div class="dropdown-content">
            <a href="aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a>
            <a href="aisle.php?aisle=Meats">Meats</a>
            <a href="aisle.php?aisle=Frozen Foods">Frozen Foods</a>
            <a href="aisle.php?aisle=Snacks">Snacks</a>
            <a href="aisle.php?aisle=Drinks">Drinks</a>
          </div>
        </div>
        <a href="../index.html">Home</a>
      </nav>
    </header>

    <header id="aisleHeader">
      <?php echo '<h1>' . $aisle . '</h1>' ?>
    </header>

    <aside id="aisleSidebar">
      <h2>Aisles</h2>
      <nav>
        <ul>
          <li><a href="aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a></li>
          <li><a href="aisle.php?aisle=Meats">Meats</a></li>
          <li><a href="aisle.php?aisle=Frozen Foods">Frozen Foods</a></li>
          <li><a href="aisle.php?aisle=Snacks">Snacks</a></li>
          <li><a href="aisle.php?aisle=Drinks">Drinks</a></li>
        </ul>
      </nav>
    </aside>

    <article id="aisleProducts">
      <h2>Our Products</h2>
      <div class="flex-productContainer">
        <?php
          //Loop through each product in the product json
          foreach ($jsonFileDecoded as $product) {
            //Check if the product belongs to the correct category
            if (strcmp($product['aisle'], $aisle) == 0) {
              //Check if there is a weight stored to show the per kg
              $weight = '';
              if(!strcmp($product['weight'], '') == 0) {
              $weight = '/kg';
              }
              echo 
              '<div class="productContainer">
                <img class="img-fluid" src="' . $product['img'] . '" alt="' . $product['name'] . '" />
                <h3>' . $product['name'] . '</h3>
                <p class="price">$' . $product['price'] . $weight . '</p>
                <button type="button" onclick="window.location.href = \'../FrontEndPages/ProdDesc.php?prod=' . $product['name'] . '\'">View Details</button>
              </div>';
            }
          }
        ?>
      </div>
    </article>

    <footer id="mainFooter">
      <img id="logo" class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods logo">
      <div class="ftMain">
        <div class="ftList">
          <p>Aisles</p>
          <ul>
            <li><a href="aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a></li>
            <li><a href="aisle.php?aisle=Meats">Meats</a></li>
            <li><a href="aisle.php?aisle=Frozen Foods">Frozen Foods</a></li>
            <li><a href="aisle.php?aisle=Snacks">Snacks</a></li>
            <li><a href="aisle.php?aisle=Drinks">Drinks</a></li>
          </ul>
        </div>
        <div class="ftList">
          <p>Login/Sign Up</p>
          <ul>
            <li><a href="../FrontEndPages/login.html">Login</a></li>
            <li><a href="../FrontEndPages/p6.html">Sign Up</a></li>
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
        <div class="ftList">
          <p>Backend Functions</p>
          <ul>
            <li><a href="../BackEndPages/ProductList.php">Product List</a></li>
            <li><a href="../BackEndPages/p8.php?prod=new">Edit a Product</a></li>
            <li><a href="../BackEndPages/UsersList.html">User List</a></li>
            <li><a href="../BackEndPages/User_Edit.html">Edit a User</a></li>
            <li><a href="../BackEndPages/p11.html">Order List</a></li>
            <li><a href="../BackEndPages/Order_Edit.html">Edit an Order</a></li>
          </ul>
        </div>
      </div>
    </footer>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>