<!DOCTYPE HTML>
<html lang="en">

<?php 

  /**
   * TO DO
   * Save order (i.e. submit form and change json)
   * Delete row with AJAX
   * Update price with JS
   */
  $ord = $_GET['order'];
  $file = "../BackEndPages/Databases/orders.json";
  $jsonFile = file_get_contents("$file");
  $jsonFileDecoded = json_decode($jsonFile, true);
  $currentOrder;
  $orderNum;
  //Loop through each product in the product json
  //Check if it is a new product, and make the current prod equal to the blank data
  if (strcmp($ord, 'new') == 0) {
    $currentOrder = $jsonFileDecoded[0];
    //Create new order number (+1 from the last order)
    $cnt = count($jsonFileDecoded) - 1;
    $orderNum = $jsonFileDecoded[$cnt]['orderNum'] + 1;
  }
  else {
    foreach ($jsonFileDecoded as $order) {
      //Check if the product belongs to the correct category
      if ($order['orderNum'] == $ord) {
        $currentOrder = $order;
      }
    }
  }

  //get product list
  $prodFile = "../BackEndPages/Databases/ProductList.json";
  $jsonProdFile = file_get_contents("$prodFile");
  $jsonProdFileDecoded = json_decode($jsonProdFile, true);

  //Excecutes when the form  is submitted
  // if(isset($_POST['submit'])) {
    
  //   //Product to add based on form values
  //   $newArray = array(
  //     'name' => $_POST['name'],
  //     'aisle' => $_POST['aisle'],
  //     'description' => $_POST['description'],
  //     'img' => $_POST['img'],
  //     'price' => $_POST['price'],
  //     'weight' => $_POST['weight'],
  //     'inventory' => $_POST['inventory']
  //   );

  //   //Loop through to find if there is a product with the same name to replace
  //   $j = count($jsonFileDecoded);
  //   $flag = false;
  //   for($i=0; $i<($j); $i++) {
  //     //If the product isnt entered as a new product replace the old one based on name from url
  //     if (!(strcmp($prod, 'new') == 0)) {
      
  //       if (strcmp($jsonFileDecoded[$i]['name'], $prod) == 0) {
  //         $flag = true;
  //         $jsonFileDecoded[$i] = $newArray;
  //       }  

  //     }
  //     //If the product is entered as a new product replace based on the new name
  //     else {

  //       if (strcmp($jsonFileDecoded[$i]['name'], $_POST['name']) == 0) {
  //         $flag = true;
  //         $jsonFileDecoded[$i] = $newArray;
  //       }  

  //     }     
  //   }
  //   //Create new entry if none were matching
  //   if($flag == false) {
  //     //Append new product to json array    
  //     $jsonFileDecoded[] = $newArray;
  //   }
    
  //   //Reencode the json string and save it in the file
  //   $json_string = json_encode($jsonFileDecoded, JSON_PRETTY_PRINT);
  //   file_put_contents($file, $json_string);

  //   //Prevent data leaks... close the json file
  //   unset($file);

  //   //Send the user back to the product list page
  //   header("Location: ProductList.php");

  // }

?>

<head>
  <meta charset="utf-8">
  <meta name = "Description" content = "Page #12, Edit an Order">
  <meta name = "Author" content = "Shiloh Rodrigues"> 
  <meta name="keywords" content="grocery, food, store">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../FontAwesome/css/all.css">
  <link rel="shortcut icon" href="../images/favicon.ico"../>
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
      <h1>Edit an Order</h1>
    </header>
    
    <form id="form-p12">

      <div class="order-info">
        <label>Order Number:</label>
        <input name="orderNum" type="text" class="form-control" disabled value="<?php echo $orderNum;?>">
        <label>Student ID:</label>
        <input name="studentId" type="text" class="form-control" placeholder="Student ID of the student" value="<?php echo $currentOrder['studentId'];?>">
        <label>Total Price:</label>
        <input name="studentId" type="text" class="form-control" disabled value="<?php echo $currentOrder['totPrice'];?>">
      </div>

      <div class="mini-prod-table">
        <div class="fixTableHead">
          <table id="productTable">
            <thead>
              <tr>
                <th>Product</th>
                <th>Add</th>
              </tr>
            </thead>
            <tbody>
              <?php
                //Loop for every product
                foreach($jsonProdFileDecoded as $product) {
                  if (!strcmp($product['name'], '') == 0) {
                    echo 
                    '<tr>
                      <td>' . $product['name'] . '</td>
                      <td><a onclick="addToTable(this)"><i class="fas fa-plus-circle"></i></a></td>
                    </tr>';
                  }     
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>   
      <div class="fixTableHead">
        <table id="orderTable">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (!$currentOrder['orderNum'] == '') {
                //Loop for every product in the order
                foreach($currentOrder['products'] as $prod) {
                  echo
                  '<tr>
                    <td>' . $prod['name'] . '</td>
                    <td><input type="number" id="order-quantity" min="0" max="100" value="' . $prod['quantity'] . '"></td>
                    <td><button onclick="deleteTableRow(this)"><i class="fas fa-times-circle"></i></button></td>
                  ';
                }
              }
            ?>
          </tbody>
        </table>
      </div>

      <button id="bt_save" name="submit" type="submit" value="Submit">Save Changes</button>

    </form>
    
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

  <script src="../myScript1.js"></script>
  
</body>

</html>