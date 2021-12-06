<?php
  $new=false;
  $users=file_get_contents('Databases/users.json');
  $userArray = json_decode($users,true);
  $l=count($userArray);
  $json_data;
      $arr = array(
            'StudentID' => $_POST['sID'],
            'First_Name' => $_POST['fName'],
            'Last_Name' => $_POST['lName'],
            'Password' => $_POST['Password'],
            'E-mail' => $_POST['email'],
            'P_Number' => $_POST['Pnumber'],
            'M_Number' => $_POST['mobile'],
            'Address' => $_POST['Address']);
      for($i=0; $i<($l);$i++){
        if(strcmp($userArray[$i]['StudentID'],$arr['StudentID'])==0){
          $userArray[$i] = $arr;
          $json_data=json_encode($userArray,JSON_PRETTY_PRINT);
          file_put_contents('Databases/users.json',$json_data);
          break;
      }
      elseif($i==count($userArray)-1){
        $new=true;
      }
      }
      if($new){
        $userArray[] = $arr;
        $json_data=json_encode($userArray,JSON_PRETTY_PRINT);
        file_put_contents('Databases/users.json',$json_data);
      }
  header('location:UsersList.php');

  /*$users=file_get_contents('Databases/users.json');
  $userArray = json_decode($users);
      $arr = array(
            'StudentID'=>$_POST['sID'],
            'First_name' => $_POST['fName'],
            'Last_name' => $_POST['lName'],
            'Password' => $_POST['Password'],
            'E-mail' => $_POST['email'],
            'P_Number' => $_POST['Pnumber'],
            'M_Number' => $_POST['mobile'],
            'Address' => $_POST['Address']);
      $userArray[] = $arr;
      $json_data=json_encode($userArray,JSON_PRETTY_PRINT);
      file_put_contents('Databases/users.json',$json_data);*/
 ?>
