<<?php
session_start();
session_destroy();
unset($_SESSION['StudentID']);
header("location: ../index.html");
 ?>
