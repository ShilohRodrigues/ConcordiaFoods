<?php
include_once("_dbconnect.php");
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

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>New User SignedUp!</strong> Your account has been created
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
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
                        <a href="../FrontEndPages/signup.php">Sign Up</a>
                    </div>
                </div>
                <a href="../FrontEndPages/Cart_P4.html">View Cart</a>
                <div class="dropdown">
                    <button class="dropbtn active">Products</button>
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

        <header id="aisleHeader">
            <h1>Sign Up</h1>
        </header>

        <form action="_dbconnect.php" method="POST">
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
                        <label for="tb-last-name">LAST NAME</label>
                        <input type="text" id="tb-last-name" name="lname">
                        <label for="tb-last-name">STUDENT-ID</label>
                        <input type="text" id="tb-last name" name="studentID">
                    </div>
                </div>

                <div class="contact-info-outer">
                    <h4>Contact Information</h4>
                    <div class="contact-info-inner">
                        <label for="tb-address">ADDRESS (NO, STREET)</label>
                        <input type="text" id="tb-address" name="address">
                        <label for="tb-city">CITY</label>
                        <input id="tb-city" name="city" name="postal">
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
                        <label for="tb-phone">PHONE NUMBER</label>
                        <input id="tb-phone" name="phone">
                        <label for="tb-mobile">MOBILE PHONE</label>
                        <input id="tb-mobile" name="mobile">
                        <label for="tb-email">EMAIL</label>
                        <input id="tb-email" name="email">
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
                <button type="submit" class="bt-create-account">Create Account</button>
                <button type="reset" class="bt-reset">Reset</button>
            </div>

            <!-- footer -->
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
                    <div class="ftList">
                        <p>Backend Functions</p>
                        <ul>
                            <li><a href="../BackEndPages/ProductList.html">Product List</a></li>
                            <li><a href="../BackEndPages/p8.html">Edit a Product</a></li>
                            <li><a href="../BackEndPages/UsersList.html">User List</a></li>
                            <li><a href="../BackEndPages/User_Edit.html">Edit a User</a></li>
                            <li><a href="../BackEndPages/p11.html">Order List</a></li>
                            <li><a href="../BackEndPages/Order_Edit.html">Edit an Order</a></li>
                        </ul>
                    </div>
                </div>
            </footer>
    </div>
</body>

</html>