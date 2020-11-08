<?php
  //errors can be seen
  ini_set('display_startup_errors', '1');
  ini_set('display_errors', '1');
  error_reporting(E_ALL);

  //login credentials
  $db_hostname = 'Localhost';
  $db_username = 'admin84843';
  $db_password = 'sudo1234';
  $db_database = '84843_beroeps';

  //mysqli connection
  $mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

  //If a error then you get a error code
  if(!$mysqli)
  {
    echo "FOUT: geen connectie naar Database. <br/>";
    echo "Errno: " . mysqli_connect_errno() . "<br/>";
    echo "Error: " . mysqli_connect_error() . "<br/>";

    exit;
  }
 ?>
