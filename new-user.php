<?php 

  include('config/db_connect.php');

  $data = json_decode(file_get_contents('php://input'), true);

  if(!$data){
    echo "ERROR GETTTING THE DATA";
  } else {

    $firstName = mysqli_real_escape_string($conn, $data["firstname"]);
    $lastName = mysqli_real_escape_string($conn, $data["lastname"]);
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);

    $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES('$firstName', '$lastName', '$email', '$password')";

    //save to db
    if(mysqli_query($conn, $sql)){
      // success
      header('Location: index.php');
    }else{
      echo 'ERROR IN DATABASE ' + mysqli_error($conn); 
    }
  }

  include('config/db_disconnect.php');

?>
