<?php
$string=file_get_contents("users.json");
$users_a=json_decode($string,true);
$check=false;

foreach($users_a as $value){
    if($_POST['StudentID']==$value["StudentID"] and $_POST['Password']==$value["Password"]){
      echo "You are logged in! Welcome!";
      $check=true;
      break;
    }
}if(!$check){
  echo"StudentID and/or Password is incorrect";
}
?>
