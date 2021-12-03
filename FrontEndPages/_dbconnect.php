<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $studentErr = $passerr= $passerragain= "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //validating StudentID
    //$studentID = $_POST['studentID'];
    if (empty($_POST['studentID'])) {
        echo "</script>alert('StudentID is required')</script>";
        $studentErr = "StudentID is required";
    }
    else{
        $studentID = $_POST['studentID'];
    }

    //validating First Name
    //$fname = $_POST['fname'];
    if (empty($_POST['fname'])) {
        echo "</script>alert('Name is required')</script>";
        $nameErr = "Name is required";
    }
    else{
        $fname = $_POST['fname'];
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {  
            echo "<script>alert('Invalid fname')</script>";
            $nameErr = "Only alphabets and white space are allowed";  
        }  
    }
    // if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
    //     $nameErr = "Only letters and white space allowed";
    // }

    //validating Last Name
    //$lname = $_POST['lname'];
    if (empty($_POST['lname'])) {
        echo "<script>alert('Name is required')</script>";
        $nameErr = "Name is required";
    }
    else{
        $lname = $_POST['lname'];
        if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {  
            echo "<script>alert('Invalid lname')</script>";
            $nameErr = "Only alphabets and white space are allowed";  
        }  
    }

    // validating Password
    //$password = $_POST['password'];
    //$cpassword = $_POST['cpassword'];
    if (empty($_POST['password'])) {
        echo "<script>alert('Passwords is required')</script>";
        $passerr = "password is required";
    }
    else{
        $password = $_POST['password'];
    }

    if (empty($_POST['cpassword'])) {
        echo "<script>alert('Passwords do not match')</script>";
        $passerragain = "password is not matched";
    }
    else{
        $cpassword = $_POST['cpassword'];
        if($password!=$cpassword)
        {
            $passerragain = "password is not matched";
            echo "<script>alert('Confirm Password not matches')</script>";
        }
    }

    //validating Email
    //$email = $_POST['email'];
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        echo "<script>alert('email required')</script>";
    }
    else{
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo "<script>alert('Invalid email format')</script>";
        }
    }
    
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    // $postalcode = $_POST['postal'];
    // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> new user has been signedup successfully!
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //       <span aria-hidden="true">×</span>
    //     </button>
    //   </div>';



    //Decode the JSON
    //Make a new associative array of new member's information.
    //place it in the array that will be using json_decode("users.json")
    //json_encode("users.json") to place new member inside json file correctly
    //Might have to use file_put_contents(). Ask TA!
    // $json_a=array("studentID"=$_POST['studentID']);


    $data_results = file_get_contents("users.json");
    $tempArray = json_decode($data_results);
    $file = "users.json";
    if (isset($_POST['submit'])) {
        if($nameErr =="" &&  $emailErr == "" &&$genderErr == "" && $websiteErr == "" && $studentErr == "" && $passerr== "" && $passerragain== "")
        
        {
            $arr = array(
            'StudentID' => $_POST['studentID'],
            'First_name' => $_POST['fname'],
            'Last_name' => $_POST['fname'],
            'Password' => $_POST['password'],
            'E-mail' => $_POST['email'],
            'P_Number' => $_POST['phone'],
            'M_Number' => $_POST['mobile'],
            'Address' => $_POST['address']
        );
        $tempArray[] = $arr;
        $json_data = json_encode($tempArray);
        file_put_contents($file, $json_data);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> new user has been signedup successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';
        }

        else{
            echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
            
        }
    }



    // function test_input($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }

}