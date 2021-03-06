<?php
session_start();
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
        <a href="../FrontEndPages/Cart_P4.php">Cart</a>
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
        <h1>Edit User</h1>
      </header>

      <article>
        <div class="userContainer">
          <form action="UserUpdate.php" method='post'>
          <label for="StudentID"><large>S</large>tudent <large>ID</large></label><br>
          <input name="sID" id=sID type=text value="<?php echo $currentUser['StudentID'];?>" <?php if(strcmp($currentUser['StudentID'],"")!=0){echo "readonly";}?>><br><br>
          <label for="fName"><large>F</large>irst <large>N</large>ame</label><br>
          <input type="text" id="fName" name="fName" value="<?php echo $currentUser['First_Name'];?>"><br><br>
          <label for="lName"><large>L</large>ast <large>N</large>ame</label><br>
          <input type="lName" id="lName" name="lName" value="<?php echo $currentUser['Last_Name'];?>"><br><br>
          <label for="email"><large>E</large>-mail</label><br>
          <input type="text"  id="email" name="email" value="<?php echo $currentUser['E-mail'];?>"><br><br>
          <label for="Phone Number"><large>P</large>hone <large>N</large>umber</label><br>
          <input type="text"  id="Pnumber" name="Pnumber" value="<?php echo $currentUser['P_Number'];?>"><br><br>
          <label for="mobile"><large>M</large>obile</label><br>
          <input type="text"  id="mobile" name="mobile" value="<?php echo $currentUser['M_Number'];?>"><br><br>
          <label for="pCode"><large>A</large>ddress</label><br>
          <input type="text"  id="Postal" name="Postal" value="<?php echo $currentUser['Postal_Code'];?>"><br><br>
          <label for="Address"><large>P</large>ostal <large>C</large>ode</label><br>
          <input type="text"  id="Address" name="Address" value="<?php echo $currentUser['Address'];?>"><br><br>
          <label for="password"><large>P</large>assword</label><br>
          <input type="password" id="Password" name="Password" value="<?php echo $currentUser['Password'];?>"><br><br>
          <label for="confirmpassword"><large>C</large>onfirm <large>P</large>assword</label><br>
          <input type="password" id="cPassword" name="CPassword"><br><br>
          <button type="submit" name="Save">Save</button>
          </form>
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
    </body>
