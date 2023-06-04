<?php
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email= $_POST['email'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $phonenumber = $_POST['phonenumber'];

  //Database connection

  $conn = new mysqli('localhost','root','','be~jewel form');
  if($conn->connect_error)
  {
    die('Connection Failed : '.$conn->connect_error);

  }
  else{
    $stmt = $conn->prepare("insert into registration (firstname,lastname,email,address,phonenumber,dob) values (?,?,?,?,?,?) ");
    $stmt->bind_param("ssssii",$firstname,$lastname,$email,$address,$phonenumber,$dob);
    $stmt->execute();
    echo '<script> 
     alert("Registration Successful..");
     window.location.href = "http://localhost/practise_project_2/";
     </script>';
      //  echo "registration successfully....";
    $stmt->close();
    $conn->close();
  }
?>