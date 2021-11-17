<?php
  //include the database connection
  include_once 'db.php';
  $username = $_POST['username'];
  $password =  $_POST['password'];
  $email = $_POST['email'];
  $fullName = $_POST['fullName'];
  $ICPassport = $_POST['ICPassport'];

// check the connection
if($conn->connect_error)
    die(" DB Connection failed " . $conn->connect_error);  

//Check existing user
$query ="SELECT * FROM tb_patients WHERE username='$username';";
$result = mysqli_query($conn,$query);
 if(mysqli_num_rows($result)>0){
     echo '<script>alert("Userename already exist.");window.location = "../signup.php";</script>';

}else{
  // Insert the values into database table users
  $sqlQuery = "INSERT INTO tb_patients VALUES ('$username', '$password', '$email', '$fullName', '$ICPassport')";

  // Execute the query
  if ($conn->query($sqlQuery) == TRUE ) {
    echo '<script>alert("Sign up successful");window.location = "../index.php";</script>';
  }
  else {
    echo "<script>alert('sign up failed');</script>";
  }
}





// Close DB connection
$con->close();

?>
