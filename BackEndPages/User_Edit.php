<?php
$user = $_GET['user'];
$file = "../BackEndPages/Databases/users.json";
$jsonFile = file_get_contents("$file");
$jsonFileDecoded = json_decode($jsonFile, true);
$currentUser;



//Loop through each product in the product json
//Check if it is a new product, and make the current prod equal to the blank data
if (strcmp($user, 'new') == 0) {
  $currentUser = $jsonFileDecoded[0];
}
else {
  foreach ($jsonFileDecoded as $usr) {
    //Check if the product belongs to the correct category
    if (strcmp($usr['StudentID'], $user) == 0) {
      $currentUser = $usr;
    }
  }
}


 ?>

<doctype html>
  <html>
    <head>
      <meta chartset="utf-8"../>
      <meta name="Description" content="Page10,UserEdit"../>
      <meta name="Author" content="Adam Farahat"../>
      <meta name="viewport" content="width=device-width, initial-scale=1"../>
      <link rel="shortcut icon" href="../images/favicon.ico"../>
      <title>Concordia Foods</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"../>
      <link rel="stylesheet" type="text/css" href="../style.css"../>
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
        <h1>Edit User</h1>
      </header>

      <article>
        <div class="userContainer">
          <form>
          <label for="fName"><large>F</large>irst <large>N</large>ame</label><br>
            <input type="text" id="fName" name="fName" value="<?php echo $currentUser['First_Name'];?>"><br><br>
          <label for="lName"><large>L</large>ast <large>N</large>ame</label><br>
          <input type="lName" id="lName" name="lName" value="<?php echo $currentUser['Last_Name'];?>"><br><br>
            <label for="sID"><large>S</large>tudentID</label><br>
          <input type="text"  id="sID" name="sID" value="<?php echo $currentUser['StudentID'];?>"><br><br>
          <label for="email"><large>E</large>-mail</label><br>
          <input type="text"  id="email" name="email" value="<?php echo $currentUser['E-mail'];?>"><br><br>
          <label for="Pnumber"><large>P</large>hone <large>N</large>umber</label><br>
          <input type="text"  id="Pnumber" name="Phone Number" value="<?php echo $currentUser['P_Number'];?>"><br><br>
          <label for="mobile"><large>M</large>obile</label><br>
          <input type="text"  id="mobile" name="mobile" value="<?php echo $currentUser['M_Number'];?>"><br><br>
          <label for="pCode"><large>A</large>ddress</label><br>
          <input type="text"  id="Postal" name="Postal" value="<?php echo $currentUser['Postal_Code'];?>"><br><br>
          <label for="Address"><large>P</large>ostal <large>C</large>ode</label><br>
          <input type="text"  id="Address" name="Address" value="<?php echo $currentUser['Address'];?>"><br><br>
          <label for="PROVINCE"><large>P</large>rovince</label><br>
          <select class="selectcategory3">
              <option value="">Ontario</option>
              <option value="">Alberta</option>
              <option value="">British Columbia</option>
              <option value="">Manitoba</option>
              <option value="">New <large>B</large>runswick</option>
              <option value="">Newfoundland and Labrador</option>
              <option value="">Northwest Territories</option>
              <option value="">Nova Scotia</option>
              <option value="">Nunavut</option>
              <option value="">Prince E>dward Island</option>
              <option value="">Quebec</option>
              <option value="">Saskatchewan</option>
              <option value="">Y>ukon</option>
          </select><br><br>
          <label for="password"><large>P</large>assword</label><br>
          <input type="password" id="Password" name="Password" value="<?php echo $currentUser['Password'];?>"><br><br>
          <label for="confirmpassword"><large>C</large>onfirm <large>P</large>assword</label><br>
          <input type="password" id="cPassword" name="CPassword"><br><br>
          <button type="submit">Save</button>
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
    </body>
