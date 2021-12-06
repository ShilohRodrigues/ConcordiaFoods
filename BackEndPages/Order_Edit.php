<!DOCTYPE HTML>
<html lang="en">
<?php
session_start();
 ?>
<?php 

  $ord = $_GET['orderNumber'];
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
      if ($order['orderNum'] == $ord) {
        $currentOrder = $order;
        $orderNum = $order['orderNum'];
      }
    }
  }

  //get product list
  $prodFile = "../BackEndPages/Databases/ProductList.json";
  $jsonProdFile = file_get_contents("$prodFile");
  $jsonProdFileDecoded = json_decode($jsonProdFile, true);

  //Excecutes when the form  is submitted
  if(isset($_POST['submit'])) {
    
    $prodArray;
    $j = count($_POST['products']);
    //Create array of products in the order
    for($i=0; $i<($j); $i++) {
      $prodArray[] = array(
        'name' => $_POST['products'][$i],
        'quantity' => $_POST['quantities'][$i]
      );
    }

    //Calculate the new total price
    $price = 0;
    foreach($prodArray as $product) {
      //Find the selected product in product json
      foreach($jsonProdFileDecoded as $prodJson) {
        if (strcmp($product['name'], $prodJson['name']) == 0) {
          //Check if the product is sold by weight or by unit
          if($prodJson['weight'] == null) {
            //calc price qt * price
            $price = $price + ($product['quantity'] * $prodJson['price']);
          }
          else {
            //calc price qt * price * weight
            $price = $price + ($product['quantity'] * $prodJson['price'] * $prodJson['weight']);
          }
        }
      }
    }
    $price = round($price, 2);

    //Order to add based on form input
    $newArray = array(
      'orderNum' => $_POST['orderNum'],
      'studentId' => $_POST['studentId'],
      'totPrice' => $price,
      'products' => $prodArray
    );

    //Check if we are adding a new order or editing an existing one 
    if(strcmp($ord, 'new') == 0) {
      echo 'new';
      $jsonFileDecoded[] = $newArray;
    }
    else {
      $j = count($jsonFileDecoded);
      for($i=0; $i<($j); $i++) {
        if ($jsonFileDecoded[$i]['orderNum'] == $_POST['orderNum']) {
          $jsonFileDecoded[$i] = $newArray;
        }
      }
    }

    //Reencode the json string and save it in the file
    $json_string = json_encode($jsonFileDecoded, JSON_PRETTY_PRINT);
    file_put_contents($file, $json_string);

    //Prevent data leaks... close the json file
    unset($file);
    unset($prodFile);

    //Send the user back to the product list page
    header("Location: p11.php");

  }

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
        <a href="../index.php"><img class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods"></a>
      </div>
      <nav>
        <div class="dropdown">
          <?php if(isset($_SESSION['StudentID'])){echo "<button class='dropbtn active'>".$_SESSION['StudentID']."</button>";}
                  else{echo "<button class='dropbtn active'>Account</button>";}?>
          <div class="dropdown-content">
            <?php
             if(isset($_SESSION['StudentID'])){echo'<a href="../FrontEndPages/Logout.php">Logout</a>';}
            else{echo'<a href="../FrontEndPages/login.php">Login</a>';}
            ?>
            <?php if(!(isset($_SESSION['StudentID']))) {echo '<a href="../FrontEndPages/signup.php">Sign Up</a>';} ?>
          </div>
        </div>
        <a href="../FrontEndPages/Cart_P4.php">View Cart</a>
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
        <a href="../index.php">Home</a>
      </nav>
    </header>
    
    <header id="backendHeader">
      <h1>Edit an Order</h1>
    </header>
    
    <form id="form-p12" method="post" action="">

      <div class="order-info">
        <label>Order Number:</label>
        <input name="orderNum" type="text" class="form-control" readonly value="<?php echo $orderNum;?>">
        <label>Student ID:</label>
        <input name="studentId" type="text" class="form-control" placeholder="Student ID of the student" value="<?php echo $currentOrder['studentId'];?>">
        <label>Total Price ($):</label>
        <input name="totPrice" type="text" class="form-control" readonly value="<?php echo $currentOrder['totPrice'];?>">
        <label style="font-size:0.9em; text-align:center;">(The price will be updated when the changes are saved)</label>
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
                    <td><input type="text" name="products[]" readonly value="' . $prod['name'] . '"></td>
                    <td><input type="number" name="quantities[]" id="order-quantity" min="0" max="100" value="' . $prod['quantity'] . '"></td>
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
            <li><a href="../FrontEndPages/login.php">Login</a></li>
            <li><a href="../FrontEndPages/signup.php">Sign Up</a></li>
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
                  <li><a href="ProductList.php">Product List</a></li>
                  <li><a href="p8.php?prod=new">Edit a Product</a></li>
                  <li><a href="UsersList.php">User List</a></li>
                  <li><a href="User_Edit.php?user=new">Edit a User</a></li>
                  <li><a href="p11.php">Order List</a></li>
                  <li><a href="Order_Edit.php?orderNumber=new">Edit an Order</a></li>
                </ul>
              </div>';
              }
            } ?>    
      </div>
    </footer>
  
  </div>

  <script src="../myScript1.js"></script>
  
</body>

</html>