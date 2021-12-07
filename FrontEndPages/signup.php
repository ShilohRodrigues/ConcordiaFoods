<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include("_dbconnect.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp for the user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container-xxl pt-2">
        <!-- Header-->
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
                if(isset($_SESSION['StudentID'])){echo'<a href="Logout.php">Logout</a>';}
                else{echo'<a href="login.php">Login</a>';}
                ?>
                <?php if(!(isset($_SESSION['StudentID']))) {echo '<a href="signup.php">Sign Up</a>';} ?>
            </div>
            </div>
            <a href="Cart_P4.php">Cart</a>
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

        <header id="aisleHeader">
            <h1>Sign Up</h1>
        </header>

        <form action="_dbconnect.php" method="POST">
        <?php
					if(isset($_SESSION["error"])){
						$error=$_SESSION["error"];
						echo '<span style="color:red; text-align:center; font-size:1.5em;",  id="error">' . $error . '</span><br>';
					}
				 ?>
            <div class="signup-wrapper">
                <div class="personal-info-outer">
                    <h4>Personal Information</h4>
                    <div class="personal-info-inner">
                        <label for="select-title">TITLE</label>
                        <select id="select-title">
                            <option value="">Select Title</option>
                            <option value="">Mr.</option>
                            <option value="">Mrs.</option>
                            <option value="">Miss</option>
                            <option value="">Ms.</option>
                        </select>
                        <label for="tb-first-name">FIRST NAME</label>
                        <input type="text" id="tb-first-name" name="fname">
                        <span class="error"> <?php echo $studentErr; ?></span>
                        <label for="tb-last-name">LAST NAME</label>
                        <input type="text" id="tb-last-name" name="lname">
                        <span class="error"> <?php echo $nameErr; ?></span>
                        <label for="tb-last-name">STUDENT-ID</label>
                        <input type="text" id="tb-last name" name="studentID">
                        <span class="error"> <?php echo $nameErr; ?></span>
                    </div>
                </div>

                <div class="contact-info-outer">
                    <h4>Contact Information</h4>
                    <div class="contact-info-inner">
                        <label for="tb-address">ADDRESS (NO, STREET)</label>
                        <input type="text" id="tb-address" name="address">
                        <label for="tb-city">CITY</label>
                        <input id="tb-city" name="city">
                        <label for="select-country">Country</label>
                        <select id="select-country">
                            <option>Canada</option>
                        </select>
                        <label for="select-province">Province</label>
                        <select id="select-province">
                            <option value="">Ontario</option>
                            <option value="">Alberta</option>
                            <option value="">British Columbia</option>
                            <option value="">Manitoba</option>
                            <option value="">New Brunswick</option>
                            <option value="">Newfoundland and Labrador</option>
                            <option value="">Northwest Territories</option>
                            <option value="">Nova Scotia</option>
                            <option value="">Nunavut</option>
                            <option value="">Prince Edward Island</option>
                            <option value="">Quebec</option>
                            <option value="">Saskatchewan</option>
                            <option value="">Yukon</option>
                        </select>
                        <label for="tb-zip">ZIP</label>
                        <input id="tb-Postal" name="Postal">
                        <label for="tb-phone">PHONE NUMBER</label>
                        <input id="tb-phone" name="phone">
                        <label for="tb-mobile">MOBILE PHONE</label>
                        <input id="tb-mobile" name="mobile">
                        <label for="tb-email">EMAIL</label>
                        <input id="tb-email" name="email"><span class="error"> <?php echo $emailErr; ?></span>

                        <label for="tb-confirm-email">CONFIRM EMAIL</label>
                        <input id="tb-confirm-email" name="cemail">
                        <label for="tb-password">PASSWORD</label>
                        <input id="tb-password" name="password">
                        <label for="tb-confirm-password">CONFIRM PASSWORD</label>
                        <input id="tb-confirm-password" name="cpassword">
                    </div>
                </div>
            </div>
            <div class="button-wrapper">
                <button type="submit" class="bt-create-account" name="submit">Create Account</button>
                <button type="reset" class="bt-reset">Reset</button>
            </div>
            
        </form>

        

            <!-- footer -->
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
    </div>
</body>

</html>