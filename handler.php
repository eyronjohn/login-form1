<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST["email"]);
  
    //echo $name . ' email address is' . $email;

    //database connection
    $conn = new mysqli('localhost','root','','subscribe_form');
    if($conn->connect_error){
      echo "$conn->connect_error";
      die("Connection Failed : ". $conn->connect_error);
    } else {
      $stmt = $conn->prepare("insert into account(name,email) values(?, ?)");
      $stmt->bind_param("ss", $name, $email);
      $execval = $stmt->execute();
      //echo $execval;
      //echo $firstName;
      echo "Registration successfully...";
      $stmt->close();
      $conn->close();
    }
  }
?>