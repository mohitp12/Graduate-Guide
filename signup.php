<?php

require './mysqlconfig.php';
session_start();// Starting Session

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

extract($_POST);
$pwd = $_POST['password'];

$sql = "INSERT INTO signup (email, name, password)
VALUES ('".$email."', '".$name."', '".$pwd."')";
print_r($sql);
if ($conn->query($sql) === TRUE) 
{
    echo "User created successfully";
    header("Refresh:0 ;url=http://localhost/GradeGuide/login.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>