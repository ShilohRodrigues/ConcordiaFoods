<?php 
session_set_cookie_params(3600,"/");
session_start();
$_SESSION['j'];

if ($_SESSION['j']==0) {
  
$_SESSION['ProductName1']= 'apples';
$_SESSION['ProductQuantity1']= '2';
$_SESSION['ProductPrice1']= '3';
$_SESSION['ProductName2']= 'bananas';
$_SESSION['ProductQuantity2']= '8';
$_SESSION['ProductPrice2']= '9';
$_SESSION['ProductName3']= 'Oreos';
$_SESSION['ProductQuantity3']= '3';
$_SESSION['ProductPrice3']= '2';
$_SESSION['ProductName4']= 'Bread';
$_SESSION['ProductQuantity4']= '5';
$_SESSION['ProductPrice4']= '1';
$_SESSION['ProductName5']= 'Milk';
$_SESSION['ProductQuantity5']= '3';
$_SESSION['ProductPrice5']= '3';
};
$_SESSION['j']= $_SESSION['j']+1;

$index = 1;




//update the cart with the get method
if (isset($_GET['submit'])) {

   foreach ($_GET as $key => $value) {
      
     
      if ($_GET[$key] != $_SESSION[$key] && $_GET[$key]!="") {
        
        
         $_SESSION[$key] = $_GET[$key];
      }
}

}

//print_r($_SESSION);


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Cart</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/CFlogoShort.png" />
    <script type="text/javascript" ></script>

</head>


<body onload="Summary()">

<header id="mainHeader">
      <div id="logo">
        <a href="../index.php"><img class="img-fluid" src="../images/CFlogo.png" alt="Concordia Foods"></a>
      </div>
      <nav>
        <div class="dropdown">
          <?php if(isset($_SESSION['StudentID'])){echo "<button class='dropbtn'>".$_SESSION['StudentID']."</button>";}
                  else{echo "<button class='dropbtn'>Account</button>";}?>
          <div class="dropdown-content">
            <?php
            if(isset($_SESSION['StudentID'])){echo'<a href="Logout.php">Logout</a>';}
            else{echo'<a href="login.php">Login</a>';}
            ?>
            <?php if(!(isset($_SESSION['StudentID']))) {echo '<a href="signup.php">Sign Up</a>';} ?>
          </div>
        </div>
        <a href="Cart_P4.php" class="active">Cart</a>
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
    
  <div class="WholePage">


    <div id="FirstPart"> 

      <h1 class="title">Cart</h1>
      <a class="link" href="https://shilohrodrigues.github.io/ConcordiaFoods/AislePages/Produce_Aisle.html">

        <div class="backtostore">
          <img src="../images/Cart-left Arrow.png">
           <h1 class="backtostoretext">Continue Shopping</h1>
          
        </div>
      </a>


    </div>

    <div class="SecondPart" >

    <form action ="Cart_P4.php" method="GET">

    <table style="width: 100%;"

     id="productTable">
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Delete</th>
      </tr>
<!-- 
      <tr>
        <td>Apples</td>

        <td>
          <input type="button" class="PButton1" value="+" onclick="Cart_Adjust(this)"/> 
          <input type="hidden" value="" id="hiddenElement1" /> <span class="quantity1">100</span> 
          <input type="button" class="Mbutton1" value="-" onclick="Cart_Adjust(this)" />
        </td>

        <td>%4.39</td>
        <td><input type="button" value="Remove" onclick ="location='test.php'" /></td>
      </tr> 
    -->

      
      <form action ="Cart_P4.php" method="get">
      
      <?php 
      define($index,1);
      //$index = 1;
      foreach($_SESSION as $key => $value) {
          
          if (isset($_SESSION["ProductName".$index])) {

              //echo $_SESSION["ProductName".$index];


              echo "<tr>";
              echo '<td class= ' ;echo "Pname".$index ;echo' >' ; echo $_SESSION['ProductName'.$index];echo '</td>';
              echo "<td>";
              echo '<input type="hidden" name = "';echo "ProductName".$index; echo'" value="';echo $_SESSION["ProductName".$index] ;echo '" id="';echo "NameProduct".$index; echo '"/>';

              echo '<div class="'; echo "Pquantity".$index;echo '">';

              echo '<button class="';echo "PButton".$index;echo'" onclick="Cart_Adjust(this)" type="button">-</button>';

              echo'<p class="';echo "quantity".$index; echo'">  ';echo $_SESSION['ProductQuantity'.$index] ;echo'   </p>';
              
              echo '<button class="'; echo "Mbutton".$index;echo'" onclick="Cart_Adjust(this)" type="button">+</button>';

              echo'<input type="hidden" name = "';echo "ProductQuantity".$index; echo'" value="" id="';
              echo "hiddenElement".$index;echo '" />'; 

            echo'</div>';
            echo '</td>';

            echo'<td class= "';echo "Pprice".$index;echo'" >';
            echo ('$'.floatval($_SESSION['ProductPrice'.$index])*floatval($_SESSION['ProductQuantity'.$index])) ;echo'</td>';
            echo '<td><input type="button" value="X" class="';echo "xbutton".$index; echo'" type="submit" name="submit" onclick ="Cart_X(this)" /></td>';


          }
          $index++;

        
                       
        };?>

        </form>
        </table>
      <input style="margin-left: 80%;text-align:center;" class="Update" type="submit" value="Update" name="submit"  />
              

      
    </form>

  
</div>



        

    <div class="ThirdPart">

      <h2 class="totaltitle">Total of cart: </h2>
      
      <p class="subtext">Subtotal </p>
      <p class="Amounttext">8.960 $ </p>
      <p class="QSTtext">QST </p>
      <p class="QSTamount">0.8938 $ </p>
      <p class="GSTtext">GST </p>
      <p class="GSTamount">0.4480 $ </p>
      <p class="totaltext">Total </p>
      <p class="totalamount">10.30 $ </p>
      <button class="Checkout" type="button">Checkout</button>

    </div>
    

  </div>



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
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
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
                  <li><a href="../BackEndPages/ProductList.php">Product List</a></li>
                  <li><a href="../BackEndPages/p8.php?prod=new">Edit a Product</a></li>
                  <li><a href="../BackEndPages/UsersList.php">User List</a></li>
                  <li><a href="../BackEndPages/User_Edit.php?user=new">Edit a User</a></li>
                  <li><a href="../BackEndPages/p11.php">Order List</a></li>
                  <li><a href="../BackEndPages/Order_Edit.php?orderNumber=new">Edit an Order</a></li>
                </ul>
              </div>';
              }
            } ?>    
      </div>
    </footer>





  <script src="../myScript1.js"></script>








</body>
</html>
