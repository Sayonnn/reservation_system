<?php 
$servername = "localhost";
$dbname = "";
$username = "root";
$password = "!Sayon19!";


//primary connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname,$username,$password");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "". $e->getMessage();
}

//optional connnection
function opencon() {
  $servername = "localhost";
  $dbname = "";
  $username = "root";
  $password = "!Sayon19!";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if($conn->connect_error){
    die("". $conn->connect_error);
  }else{
  echo "Connected successfully";
  }
}