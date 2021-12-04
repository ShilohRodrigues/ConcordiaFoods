 <!DOCTYPE html>
<html lang="en">

<?php 

  //Get the product list from the json
  $file = "../BackEndPages/Databases/ProductList.json";
  $jsonFile = file_get_contents("$file");
  $jsonFileDecoded = json_decode($jsonFile, true);

  //Executed when a table row is deleted, from ajax call in myScript.js
  if (isset($_POST['prodName'])) { 

    //Loop through to find if there is a product with the same name to delete
    $j = count($jsonFileDecoded);
    for($i=0; $i<($j); $i++) {
      if (strcmp($jsonFileDecoded[$i]['name'], $_POST['prodName']) == 0) {
        unset($jsonFileDecoded[$i]);
      }
    }

    //Rebase the array, since unset changes the format
    $jsonFileDecoded = array_values($jsonFileDecoded);

    //Reencode the json string and save it in the file
    $json_string = json_encode($jsonFileDecoded, JSON_PRETTY_PRINT);
    file_put_contents($file, $json_string);

    //Prevent data leaks... close the json file
    unset($file);

  }

?>

<head>
  <meta charset="utf-8">
  <meta name="Description" content="Page #7, Product List">
  <meta name="Author" content="Shiloh Rodrigues">
  <meta name="keywords" content="grocery, food, store">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="../FontAwesome/css/all.css">
  <link rel="stylesheet" href="../style.css">
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
          <button class="dropbtn">Products</button>
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

    <header id="backendHeader">
      <h1>Product List</h1>
    </header>

    <div class="fixTableHead">
      <table id="productTable">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price ($)</th>
            <th>Inventory</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
            //Loop for every product
            foreach($jsonFileDecoded as $product) {
              if (!strcmp($product['name'], '') == 0) {
                echo 
                '<tr>
                  <td>' . $product['name'] . '</td>
                  <td>' . $product['price'] . '</td>
                  <td>' . $product['inventory'] . '</td>
                  <td><a href="p8.php?prod=' . $product['name'] . '"><i class="fas fa-edit"></i></a></td>
                  <td><button onclick="deleteProductTableRow(this)"><i class="fas fa-times-circle"></i></button></td>
                </tr>';
              }     
            }
          ?>
        </tbody>
      </table>
    </div>

    <button id="btnProdAdd" onClick="location.href='p8.php?prod=new'"><i class="fas fa-plus-circle"></i> Add a Product</button>

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
            <li><a href="ProductList.php">Product List</a></li>
            <li><a href="p8.php?prod=new">Edit a Product</a></li>
            <li><a href="UsersList.html">User List</a></li>
            <li><a href="User_Edit.html">Edit a User</a></li>
            <li><a href="p11.html">Order List</a></li>
            <li><a href="Order_Edit.html">Edit an Order</a></li>
          </ul>
        </div>
      </div>
    </footer>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="../myScript1.js"></script>

</body>

</html>