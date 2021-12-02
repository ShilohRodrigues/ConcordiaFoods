<!DOCTYPE html>
<html lang="en">

<?php 
    //Get the aisle from the url
    $prod = $_GET['prod'];
    $jsonFile = file_get_contents("http://localhost/ConcordiaFoods/JSONFiles/ProductList.json");
    $jsonFileDecoded = json_decode($jsonFile, true);
    $currentProduct;
    //Loop through each product in the product json
    foreach ($jsonFileDecoded as $product) {
      //Check if the product belongs to the correct category
      if (strcmp($product['name'], $prod) == 0) {
        $currentProduct = $product;
      }
    }
?>

<head>
  <meta charset="utf-8">
  <meta name="Description" content="Page #3, Product Description Page">
  <meta name="Author" content="Shiloh Rodrigues">
  <meta name="keywords" content="grocery, food, store, apple">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="../FontAwesome/css/all.css">
  <title>Concordia Foods</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body onload="getQ('<?php echo $prod ?>')" onbeforeunload="storeQ('<?php echo $prod ?>')">

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
            <a href="../AislePages/aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a>
            <a href="../AislePages/aisle.php?aisle=Meats">Meats</a>
            <a href="../AislePages/aisle.php?aisle=Frozen Foods">Frozen Foods</a>
            <a href="../AislePages/aisle.php?aisle=Snacks">Snacks</a>
            <a href="../AislePages/aisle.php?aisle=Drinks">Drinks</a>
          </div>
        </div>
        <a href="../index.html">Home</a>
      </nav>
    </header>

    <header id="aisleHeader">
      <h1>Product Description</h1>
    </header>

    <div id="backButton" onclick="window.location.href = '../AislePages/aisle.php?aisle=<?php echo $currentProduct['aisle']?>'">
      <i class="fas fa-angle-left"></i>
      <p>Return</p>
    </div>

    <article id="productDescription">
      <?php echo '<img src="' . $currentProduct['img'] . '" alt="' . $currentProduct['name'] . '" />' ?>
      <div id="productInfo">
        <?php
          echo 
          '<h2>' . $currentProduct['name'] . '</h2>
          <p id="txt-more-description">' . $currentProduct['description'] . '</p>
          <button id="bt-more-description" onclick="openDescription()">View Description...</button>
          <p>$<span id="cost-per-kg">' . $currentProduct['price'] . '</span>/kg<br>(Average weight: <span id="weight">' . $currentProduct['weight'] . '</span> kg)</p>
          <form onsubmit="clearQ(\'' . $currentProduct['name'] . '\')">
            <label for="quantity">Quantity: </label>
            <input type="number" id="quantity" onchange="updatePrice()" name="quantity" value="" min="0" max="' . $currentProduct['inventory'] . '"><br>
            <p id="tot-price-label">Total Price: </p>
            <p id="tot-price">$0</p>
            <input type="submit" id="btSubmit" value="Add To Cart">
          </form>';
          ?>
      </div>
    </article>

    <footer id="mainFooter">
      <img id="logo" class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods logo">
      <div class="ftMain">
        <div class="ftList">
          <p>Aisles</p>
          <ul>
            <li><a href="../AislePages/aisle.php?aisle=Fruits and Vegetables">Fruits & Vegetables</a></li>
            <li><a href="../AislePages/aisle.php?aisle=Meats">Meats</a></li>
            <li><a href="../AislePages/aisle.php?aisle=Frozen Foods">Frozen Foods</a></li>
            <li><a href="../AislePages/aisle.php?aisle=Snacks">Snacks</a></li>
            <li><a href="../AislePages/aisle.php?aisle=Drinks">Drinks</a></li>
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
            <li><a href="../BackEndPages/ProductList.html">Product List</a></li>
            <li><a href="../BackEndPages/p8.html">Edit a Product</a></li>
            <li><a href="../BackEndPages/UsersList.html">User List</a></li>
            <li><a href="../BackEndPages/User_Edit.html">Edit a User</a></li>
            <li><a href="../BackEndPages/p11.html">Order List</a></li>
            <li><a href="../BackEndPages/Order_Edit.html">Edit an Order</a></li>
          </ul>
        </div>
      </div>
    </footer>

  </div>

  <script src="../myScript1.js"></script>

</body>

</html>