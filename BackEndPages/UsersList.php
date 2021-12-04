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

?>


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
          <tr>
            <td>Shiloh</td>
            <td>12345</td>
            <td><a href="User_Edit.html"><i class="fas fa-edit"></i></a></td>
            <td><button onclick="deleteTableRow(this)"><i class="fas fa-times-circle"></i></button></td>
          </tr>
          <tr>
            <td>Amrit</td>
            <td>45678</td>
            <td><a href="User_Edit.html"><i class="fas fa-edit"></i></a></td>
            <td><button onclick="deleteTableRow(this)"><i class="fas fa-times-circle"></i></button></td>
          </tr>
          <tr>
            <td>Ravish</td>
            <td>123345</td>
            <td><a href="User_Edit.html"><i class="fas fa-edit"></i></a></td>
            <td><button onclick="deleteTableRow(this)"><i class="fas fa-times-circle"></i></button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

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
              if (!strcmp($user['First_Name'], '') == 0) {
                echo
                '<tr>
                  <td>' . $user['First_Name']. $user['Last_Name'] . '</td>
                  <td>' . $user['StuedentID'] . '</td>
                  <td>' . $user['Password'] . '</td>
                </tr>';
              }
            }
            ?>
        </tbody>
      </table>
    </div>

    <button id="btnProdAdd" onClick="location.href='User_Edit.html'"><i class="fas fa-plus-circle"></i> Add a User</button>


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
            <li><a href="ProductList.html">Product List</a></li>
            <li><a href="p8.html">Edit a Product</a></li>
            <li><a href="UsersList.html">User List</a></li>
            <li><a href="User_Edit.html">Edit a User</a></li>
            <li><a href="p11.html">Order List</a></li>
            <li><a href="Order_Edit.html">Edit an Order</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  <script src="../myScript1.js"></script>

</body>
</html>
