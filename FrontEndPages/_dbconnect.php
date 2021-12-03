<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $studentErr = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "users";
    /*$conn =  mysqli_connect($server, $username, $password, $database);
    if ($conn) {
        echo "success! you connected with the database";
    } else {
        die("Error" . mysqli_connect_error());
    }*/

    //validating StudentID
    $studentID = $_POST['studentID'];
    if (empty($_POST['studentID'])) {
        // echo "</script>alert('StudentID is required')</script>";
        $studentErr = "StudentID is required";
    }

    //validating First Name
    $fname = $_POST['fname'];
    if (empty($_POST['fname'])) {
        // echo "</script>alert('Name is required')</script>";
        $nameErr = "Name is required";
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
        $nameErr = "Only letters and white space allowed";
    }

    //validating Last Name
    $lname = $_POST['lname'];
    if (empty($_POST['lname'])) {
        // echo "<script>alert('Name is required')</script>";
        $nameErr = "Name is required";
    }
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
        $nameErr = "Only letters and white space allowed";
    }

    // validating Password
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($cpassword != $password) {
        echo "<script>alert('Passwords do not match')</script>";
    }

    //validating Email
    $email = $_POST['email'];
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
    $phone = $_POST['phone'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    // $postalcode = $_POST['postal'];
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> new user has been signedup successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>';



    //Decode the JSON
    //Make a new associative array of new member's information.
    //place it in the array that will be using json_decode("users.json")
    //json_encode("users.json") to place new member inside json file correctly
    //Might have to use file_put_contents(). Ask TA!
    // $json_a=array("studentID"=$_POST['studentID']);

    /* $json_obj->fname = $fname;
    $json_obj->lname = $lname;
    $json_obj->studentID = $studentID;
    $json_obj->mobile = $mobile;
    $json_obj->password = $password;
    */

    $data_results = file_get_contents("users.json");
    $tempArray = json_decode($data_results);
    $file = "users.json";
    if (isset($_POST['submit'])) {

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
    }

    $tempArray[] = $arr;
    $json_data = json_encode($tempArray);
    file_put_contents($file, $json_data);


    // function test_input($data)
    // {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    // }
    // $sql = "INSERT INTO `users`.`users` (`firstname`, `lastname`, `studentID`,`address`, `city`, `mobile`, `email`, `password`, `dt`) VALUES ('$fname', '$lname', '$studentID','$address', '$city', '$mobile', '$email', '$password',currenttimestamp())";
    // echo $sql;

    /*if ($conn->query($sql) == true) {
        echo " successfully Inserted!";
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();*/
}
