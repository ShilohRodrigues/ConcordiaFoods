<?php
if (isset($_POST['fname'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    $conn =  mysqli_connect($server, $username, $password, $database);
    if ($conn) {
        echo "success! you connected with the database";
    } else {
        die("Error" . mysqli_connect_error());
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $studentID = $_POST['studentID'];
    // $address = $_POST['address'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $json_obj->fname = $fname;
    $json_obj->lname = $lname;
    $json_obj->studentID = $studentID;
    $json_obj->mobile = $mobile;
    $json_obj->password = $password;



    $json_data = json_encode($json_obj);
    file_put_contents("users.json", $json_data);


    // $sql = "INSERT INTO `users`.`users` (`firstname`, `lastname`, `studentID`,`address`, `city`, `mobile`, `email`, `password`, `dt`) VALUES ('$fname', '$lname', '$studentID','$address', '$city', '$mobile', '$email', '$password',currenttimestamp())";
    // echo $sql;

    if ($conn->query($sql) == true) {
        echo " successfully Inserted!";
    } else {
        echo "ERROR: $sql <br> $conn->error";
    }
    $conn->close();
}
