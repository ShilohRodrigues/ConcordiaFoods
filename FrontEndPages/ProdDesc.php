<!DOCTYPE html>
<html lang="en">

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

<body onload="getQ('Apples')" onbeforeunload="storeQ('Apples')">

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
            <a href="../AislePages/Produce_Aisle.html">Fruits & Vegetables</a>
            <a href="../AislePages/MeatAisle.html">Meats</a>
            <a href="../AislePages/FrozenFoods_Aisle.html">Frozen Foods</a>
            <a href="../AislePages/Snacks_Aisle.html">Snacks</a>
            <a href="../AislePages/drinksAisle.html">Drinks</a>
          </div>
        </div>
        <a href="../index.html">Home</a>
      </nav>
    </header>

    <header id="aisleHeader">
      <h1>Product Description</h1>
    </header>

    <div id="backButton" onclick="window.location.href = '../AislePages/Produce_Aisle.html'">
      <i class="fas fa-angle-left"></i>
      <p>Return</p>
    </div>

    <article id="productDescription">
      <img src="../images/apples.jpg" alt="Apples" />
      <div id="productInfo">
        <h2>Product Name</h2>
        <p id="txt-more-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo numquam veniam dolorum quas qui possimus libero sed hic, magni amet, nisi exercitationem blanditiis debitis enim doloremque, architecto at nobis. Minima.</p>
        <button id="bt-more-description" onclick="openDescription()">View Description...</button>
        <p>$<span id="cost-per-kg">4.39</span>/kg<br>(Average weight: <span id="weight">0.2</span> kg)</p>
        <form onsubmit="clearQ('Apples')">
          <label for="quantity">Quantity: </label>
          <input type="number" id="quantity" onchange="updatePrice()" name="quantity" value="" min="0" max="100"><br>
          <p id="tot-price-label">Total Price: </p>
          <p id="tot-price">$0</p>
          <input type="submit" id="btSubmit" value="Add To Cart">
        </form>
      </div>
    </article>

    <footer id="mainFooter">
      <img id="logo" class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods logo">
      <div class="ftMain">
        <div class="ftList">
          <p>Aisles</p>
          <ul>
            <li><a href="../AislePages/Produce_Aisle.html">Fruits & Vegetables</a></li>
            <li><a href="../AislePages/MeatAisle.html">Meats</a></li>
            <li><a href="../AislePages/FrozenFoods_Aisle.html">Frozen Foods</a></li>
            <li><a href="../AislePages/Snacks_Aisle.html">Snacks</a></li>
            <li><a href="../AislePages/drinksAisle.html">Drinks</a></li>
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