<?php
  echo "New user added";
  $users=file_get_contents('Databases/users.json');
  $userArray = json_decode($users);
      $arr = array(
            'StudentID' => $_POST['sID'],
            'First_name' => $_POST['fName'],
            'Last_name' => $_POST['lName'],
            'Password' => $_POST['Password'],
            'E-mail' => $_POST['email'],
            'P_Number' => $_POST['Pnumber'],
            'M_Number' => $_POST['mobile'],
            'Address' => $_POST['Address']);
      $userArray[] = $arr;
      $json_data=json_encode($userArray);
      file_put_contents('Databases/users.json',$json_data);
 ?>
