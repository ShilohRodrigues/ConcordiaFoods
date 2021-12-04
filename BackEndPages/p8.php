<!DOCTYPE html>

<?php 

  $prod = $_GET['prod'];
  $file = "../BackEndPages/Databases/ProductList.json";
  $jsonFile = file_get_contents("$file");
  $jsonFileDecoded = json_decode($jsonFile, true);
  $currentProduct;
  //Loop through each product in the product json
  //Check if it is a new product, and make the current prod equal to the blank data
  if (strcmp($prod, 'new') == 0) {
    $currentProduct = $jsonFileDecoded[0];
  }
  else {
    foreach ($jsonFileDecoded as $product) {
      //Check if the product belongs to the correct category
      if (strcmp($product['name'], $prod) == 0) {
        $currentProduct = $product;
      }
    }
  }

  //Excecutes when the form  is submitted
  if(isset($_POST['submit'])) {
    
    //Product to add based on form values
    $newArray = array(
      'name' => $_POST['name'],
      'aisle' => $_POST['aisle'],
      'description' => $_POST['description'],
      'img' => $_POST['img'],
      'price' => $_POST['price'],
      'weight' => $_POST['weight'],
      'inventory' => $_POST['inventory']
    );

    //Loop through to find if there is a product with the same name to replace
    $j = count($jsonFileDecoded);
    $flag = false;
    for($i=0; $i<($j); $i++) {
      //If the product isnt entered as a new product replace the old one based on name from url
      if (!(strcmp($prod, 'new') == 0)) {
      
        if (strcmp($jsonFileDecoded[$i]['name'], $prod) == 0) {
          $flag = true;
          $jsonFileDecoded[$i] = $newArray;
        }  

      }
      //If the product is entered as a new product replace based on the new name
      else {

        if (strcmp($jsonFileDecoded[$i]['name'], $_POST['name']) == 0) {
          $flag = true;
          $jsonFileDecoded[$i] = $newArray;
        }  

      }     
    }
    //Create new entry if none were matching
    if($flag == false) {
      //Append new product to json array    
      $jsonFileDecoded[] = $newArray;
    }
    
    //Reencode the json string and save it in the file
    $json_string = json_encode($jsonFileDecoded, JSON_PRETTY_PRINT);
    file_put_contents($file, $json_string);

    //Prevent data leaks... close the json file
    unset($file);

    //Send the user back to the product list page
    header("Location: ProductList.php");

  }

?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="temp.css">
      <link rel="stylesheet" href="../style.css">
      
    <title>Edit a product</title>
  </head>
  <body>
    <div class="container-xxl pt-2">
  <!-- Header-->
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
      <h1>Edit a Product</h1>
  </header>

  <form id = "p8" method="post" action="">
  <div class="form-group">

    <label>Product</label>
    <input name="name" type="text" class="form-control" placeholder="Product Name" value="<?php echo $currentProduct['name'];?>">
  
    <label>Aisle</label>
    <select name="aisle">
      <option value="" <?php if(strcmp($currentProduct['aisle'], '') == 0) {echo 'selected';} ?> disabled hidden>Select an Aisle</option>
      <option value="Fruits and Vegetables" <?php if(strcmp($currentProduct['aisle'], 'Fruits and Vegetables') == 0) {echo 'selected';} ?>>Fruits and Vegetables</option>
      <option value="Meats" <?php if(strcmp($currentProduct['aisle'], 'Meats') == 0) {echo 'selected';} ?>>Meats</option>
      <option value="Frozen Foods" <?php if(strcmp($currentProduct['aisle'], 'Frozen Foods') == 0) {echo 'selected';} ?>>Frozen Foods</option>
      <option value="Snacks" <?php if(strcmp($currentProduct['aisle'], 'Snacks') == 0) {echo 'selected';} ?>>Snacks</option>
      <option value="Drinks" <?php if(strcmp($currentProduct['aisle'], 'Drinks') == 0) {echo 'selected';} ?>>Drinks</option>
    </select>

    <label>Description</label>
    <textarea name="description" placeholder="Product Description" rows="4"><?php echo $currentProduct['description'];?></textarea>

    <label>Image URL</label>
    <input name="img" type="text" class="form-control" placeholder="Enter the full path to the image" value="<?php echo $currentProduct['img'];?>">
  
    <label>Price</label>
    <input name="price" type="text" class="form-control" placeholder="Enter in Dollars" value="<?php echo $currentProduct['price'];?>">
 
    <label>Weight per Unit (Leave empty for items sold per unit)</label>
    <input name="weight" type="text" class="form-control" placeholder="Weight in kg" value="<?php echo $currentProduct['weight'];?>">
  
    <label>Inventory</label>
    <input name="inventory" type="text" class="form-control" placeholder="Inventory (In integers)" value="<?php echo $currentProduct['inventory'];?>">

  </div>
  <button name='submit' type="submit" value="Submit" id="center_bt" class="btn btn-primary btn-lg">Submit</button>
  </form>

  <!-- Footer start -->
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
            <li><a href="p11.php">Order List</a></li>
            <li><a href="Order_Edit.php?order=new">Edit an Order</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

  </body>
</html>
