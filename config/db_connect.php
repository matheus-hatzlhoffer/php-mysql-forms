<?php

  // conect to the database
  $conn = mysqli_connect('localhost', 'matheus', 'matheus123', "new_user_php");

  // check connectiom
  if(!$conn) {
    echo "CONNECTION ERROR: " + mysqli_connect_error();
  }
?>