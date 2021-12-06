<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name = "Description" content = "Page #9, User List">
    <meta name="keywords" content="grocery, food, store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../FontAwesome/css/all.css">
    <link rel="shortcut icon" href="../images/favicon.ico"../>
    <title>Concordia Foods</title>
  </head>
<?php

$jsonLocation = "../BackEndPages/Databases/users.json";
$jsonAccess = file_get_contents("$jsonLocation");
$users;
$users = json_decode($jsonAccess, true);


if (isset($_POST['StudentID'])) {

  //Loop through to find if there is a product with the same name to delete
  $j = count($users);
  for($i=0; $i<($j); $i++) {
    if (strcmp($users[$i]['StudentID'], $_POST['StudentID']) == 0) {
      unset($users[$i]);
    }
  }

  //Rebase the array, since unset changes the format
  $users = array_values($users);

  //Reencode the json string and save it in the file
  $json_string = json_encode($users, JSON_PRETTY_PRINT);
  file_put_contents($jsonLocation, $json_string);

  //Prevent data leaks... close the json file
  unset($jsonLocation);

}
?>


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
      <h1>User List</h1>
    </header>


    <div class="fixTableHead">
      <table id="productTable">
        <thead>
          <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach($users as $user) {
              if (!strcmp($user['StudentID'], '') == 0) {
                echo
                '<tr>
                  <td>' . $user['First_Name']. " " .$user["Last_Name"] . '</td>
                  <td>' . $user['StudentID'] . '</td>
                  <td><a href="User_Edit.php?user=' . $user['StudentID'] . '"><i class="fas fa-edit"></i></a></td>
                  <td><button onclick="deleteUserRow(this)"><i class="fas fa-times-circle"></i></button></td>
                </tr>';
              }
            }
            ?>
        </tbody>
      </table>
    </div>

    <button id="btnProdAdd" onClick="location.href='User_Edit.php?user=new'"><i class="fas fa-plus-circle"></i> Add a User</button>


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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="../myScript1.js"></script>

</body>
